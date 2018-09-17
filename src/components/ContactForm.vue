<template>
    <el-form ref="form" :rules="rules" :model="callForm" label-width="100px" size="large" :status-icon="true">
        <el-form-item label="姓名" prop="name">
            <el-input v-model="callForm.name" placeholder="我们应该怎么称呼您"></el-input>
        </el-form-item>
        <el-form-item label="手机" prop="phone">
            <el-input v-model="callForm.phone" placeholder="请填写您的联系电话"></el-input>
        </el-form-item>

        <el-form-item label="项目介绍" prop="desc">
            <el-input v-model="callForm.desc" type="textarea" placeholder="请简单介绍一下您的项目想法"></el-input>
        </el-form-item>
        <el-form-item label="项目预算" prop="offer">
            <el-col :span="20" style="padding-left:0">
                <el-input v-model.number="callForm.offer" type="number" placeholder="预算不低于 1 万元"></el-input>
            </el-col>
            &nbsp;&nbsp;元
        </el-form-item>
        <el-row type="flex" class="row-bg" justify="center">
            <el-col :sm="16" :xs="20" style="padding-bottom:15px">
                <vue-recaptcha :sitekey="siteKey"></vue-recaptcha>
            </el-col>
        </el-row>
        <el-form-item size="large">
            <el-button type="primary" @click="onSubmit">立即创建</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
import VueRecaptcha from "vue-recaptcha";

export default {
  components: {
    VueRecaptcha
  },
  methods: {
    serialize: function(obj) {
      var str = [];
      for (var p in obj)
        if (obj.hasOwnProperty(p)) {
          str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
      return str.join("&");
    },
    onSubmit() {
      let gp = document.getElementById("g-recaptcha-response");
      if (gp) {
        this.callForm.gresp = gp.value;
      }
      const nb = this;
      this.$refs["form"].validate(valid => {
        if (valid) {
          // 验证码验证
          if (nb.callForm.gresp.length < 10) {
            nb.$alert(
              "您忘记通过机器人验证了哦，按钮上方会加载一个验证码，如未看到请刷新重试",
              "机器人验证",
              {
                confirmButtonText: "确定"
              }
            );
            return false;
          }
          // 加载界面
          const loading = this.$loading({
            lock: true,
            text: "正在提交",
            spinner: "el-icon-loading",
            background: "rgba(255, 255, 255, 0.7)"
          });
          // 发送请求
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "/submit.php", true);
          //发送合适的请求头信息
          xhr.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
          );
          xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
              loading.close();
              if (xhr.status == 200) {
                // 请求结束后,在此处写处理代码
                nb.$alert(
                  "如通过评估，工作人员会在48小时内联系您，请保持电话畅通。",
                  "提交成功",
                  {
                    confirmButtonText: "确定"
                  }
                );
              } else {
                nb.$alert(
                  "出现问题咯「" + xhr.responseText + "」，请您再试一次",
                  "呜呜，出错啦",
                  {
                    confirmButtonText: "确定"
                  }
                );
              }
            }
          };
          xhr.send(nb.serialize(nb.callForm));
        } else {
          return false;
        }
      });
    }
  },
  data() {
    return {
      siteKey: "6LeNrmkUAAAAABgukhlggvfs6F445h7kD7V2v0Iu",
      callForm: {
        offer: null,
        name: "",
        phone: "",
        desc: "",
        gresp: ""
      },
      rules: {
        name: [
          { required: true, message: "请输入您的姓名" },
          { min: 2, max: 30, message: "长度在 2 到 30 个字符" }
        ],
        phone: [
          { required: true, message: "请输入您的电话号码" },
          {
            pattern: "^1[3|4|5|6|7|8|9][0-9]{9}$",
            message: "请输入正确的国内手机号，无需(+86)",
            trigger: "blur"
          }
        ],
        offer: [
          { type: "number", message: "请填写您的预算" },
          { required: true, message: "请填写您的预算" },
          {
            type: "number",
            min: 10000,
            max: 10000000,
            message: "预算不低于一万元"
          }
        ],
        desc: [
          {
            required: true,
            message: "请简单填写您的项目介绍",
            trigger: "blur"
          },
          { min: 10, message: "最少写10个字" }
        ]
      }
    };
  }
};
</script>