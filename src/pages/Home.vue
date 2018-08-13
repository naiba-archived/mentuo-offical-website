<template>
  <el-container>
    <el-header>
      <el-col :sm="{span:20,offset:2}">
        <el-menu mode="horizontal">
          <el-menu-item index="0">
            <a href="/"><img height="30px" src="../../static/images/logo.png" alt="门拓科技"></a>
          </el-menu-item>
          <el-menu-item index="2">
            <el-button @click="scrollTo('content')" type="primary">
              快速联系
            </el-button>
          </el-menu-item>
          <el-menu-item index="1" class="hidden-xs-only">
            <el-button type="primary" plain>
              <a href="https://stats.mentuo.com" target="_black">状态</a>
            </el-button>
          </el-menu-item>
        </el-menu>
      </el-col>
    </el-header>
    <div class="section hero">
      <el-col :sm="{span:20,offset:2}">
        <p class="title">
          从零到一的快速软件产品开发服务
        </p>
        <p class="subtitle">
          「门拓科技」为中小创业者打造线上系统，为创业者提供网站、App、高级定制开发等技术解决方案。
        </p>
        <el-button @click="scrollTo('content')" type="primary" icon="el-icon-service" plain>快速联系</el-button>
        <el-button @click="scrollTo('example')" plain icon="el-icon-goods">近期项目</el-button>
      </el-col>
    </div>
    <div class="section">
      <el-col :sm="{span:20,offset:2}">
        <p class="plain-title">为什么选择门拓</p>
        <el-row :gutter="20">
          <el-col :sm="8" class="advantage">
            <img src="../../static/images/cheap.png">
            <h2>创造价值</h2>
            <ul>
              <li>快速开发，从零到一
              </li>
              <li>让您的点子
                <strong>变成现实</strong>
              </li>
            </ul>
          </el-col>
          <el-col :sm="8" class="advantage">
            <img src="../../static/images/pro.png">
            <h2>服务专业</h2>
            <ul>
              <li>独立的品牌形象，杜绝千篇一律
              </li>
              <li>原创系统
                <strong>保障知识产权</strong>
              </li>
            </ul>
          </el-col>
          <el-col :sm="8" class="advantage">
            <img src="../../static/images/tech.png">
            <h2>技术领先</h2>
            <ul>
              <li>扎实的技术基础，
                <strong>领先的软硬件方案</strong>
              </li>
              <li>特殊用途功能定制</li>
            </ul>
          </el-col>
        </el-row>
      </el-col>
    </div>
    <div class="section" id="example">
      <el-col :sm="{span:20,offset:2}">
        <p class="plain-title">近期案例</p>
        <el-row :gutter="20">
          <el-col :sm="8">
            <el-card class="case-item" shadow="hover">
              <img src="../../static/upload/mark.png">
              <div class="case-info">
                <span class="case-title">马克云书签，云端收藏夹</span>
                <p class="case-meta">
                  <i class="el-icon-time">
                    <span>2018年7月31日</span>
                    <i class="el-icon-location-outline">
                      <span>上海凌总</span>
                </p>
              </div>
            </el-card>
          </el-col>
          <el-col :sm="8">
            <el-card class="case-item" shadow="hover">
              <img src="../../static/upload/mark-search.png">
              <div class="case-info">
                <span class="case-title">马克智搜，一站式智能搜索</span>
                <p class="case-meta">
                  <i class="el-icon-time">
                    <span>2018年3月30日</span>
                    <i class="el-icon-location-outline">
                      <span>上海凌总</span>
                </p>
              </div>
            </el-card>
          </el-col>
          <el-col :sm="8">
            <el-card class="case-item" shadow="hover">
              <img src="../../static/upload/nocd.png">
              <div class="case-info">
                <span class="case-title">NoCD，便携持续交付系统</span>
                <p class="case-meta">
                  <i class="el-icon-time">
                    <span>2018月1日16日</span>
                    <i class="el-icon-location-outline">
                      <span>北京刘总</span>
                </p>
              </div>
            </el-card>
          </el-col>
        </el-row>
      </el-col>
    </div>
    <div class="section" id="content">
      <el-col :sm="{span:20,offset:2}">
        <p class="plain-title">联系我们</p>
        <el-col :sm="{span:12,offset:6}">
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
            <el-form-item label="甩掉机器人">
              <div class="g-recaptcha" data-sitekey="6LeNrmkUAAAAABgukhlggvfs6F445h7kD7V2v0Iu"></div>
            </el-form-item>
            <el-form-item size="large">
              <el-button type="primary" @click="onSubmit">立即创建</el-button>
            </el-form-item>
          </el-form>
        </el-col>
      </el-col>
    </div>
    <div class="section" style="text-align:center">
      Efficient Development For Better Living
    </div>
    <div class="section">
      <el-col :sm="{span:20,offset:2}" class="copyright">
        门拓科技 Mentuo Tech Co.Ltd | 门庭若市，拓土开疆
      </el-col>
    </div>
  </el-container>
</template>

<script>
export default {
  data() {
    return {
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
          { type: "number", message: "预算必须是数字" },
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
  },
  components: {},
  methods: {
    serialize: function(obj) {
      var str = [];
      for (var p in obj)
        if (obj.hasOwnProperty(p)) {
          str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
      return str.join("&");
    },
    scrollTo: function(id) {
      document.getElementById(id).scrollIntoView();
    },
    onSubmit() {
      let gp = document.getElementById("g-recaptcha-response");
      if (gp) {
        this.callForm.gresp = gp.value;
      }
      if (this.callForm.gresp.length < 10) {
        this.$alert("您忘记通过机器人验证了哦", "甩掉机器人", {
          confirmButtonText: "确定"
        });
        return false;
      }
      const nb = this;
      const loading = this.$loading({
        lock: true,
        text: "正在提交",
        spinner: "el-icon-loading",
        background: "rgba(255, 255, 255, 0.7)"
      });
      this.$refs["form"].validate(valid => {
        if (valid) {
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
  }
};
</script>

<style lang="less" scoped>
</style>
