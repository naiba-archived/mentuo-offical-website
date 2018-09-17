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
          众多行业领袖的选择，您的不二之选
        </p>
        <p class="subtitle">
          数千家中小创业者择门拓进行产品开发，门拓是您启动线上业务的最佳选择。
        </p>
        <el-button @click="scrollTo('content')" type="primary" icon="el-icon-service" plain>快速联系</el-button>
      </el-col>
    </div>
    <div class="section" id="example">
      <el-col :sm="{span:20,offset:2}">
        <p class="plain-title">往期案例</p>
        <el-row :gutter="20">
          <el-col v-for="(item,index) in cases" :sm="8" :class="index>2?'second-line-item':''">
            <el-card class="case-item" shadow="hover">
              <img :src="item.image">
              <div class="case-info">
                <span class="case-title">{{item.title}}</span>
                <p class="case-meta">
                  <i class="el-icon-time">
                    <span>{{item.time}}</span>
                    <i class="el-icon-location-outline">
                      <span>{{item.boss}}</span>
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
          <contact-form></contact-form>
        </el-col>
      </el-col>
    </div>
    <div class="section" style="text-align:center">
      Efficient Development For Better Living
    </div>
    <div class="section">
      <el-col :sm="{span:20,offset:2}" class="copyright">
        北京门拓科技 Mentuo Tech Co.Ltd | 门庭若市，拓土开疆
      </el-col>
    </div>
  </el-container>
</template>

<script>
import data from "../data";
import ContactForm from "../components/ContactForm.vue";
export default {
  data() {
    return {
      cases: data.cases
    };
  },
  components: {
    ContactForm
  },
  methods: {
    scrollTo: function(id) {
      document.getElementById(id).scrollIntoView();
    }
  }
};
</script>

<style lang="less" scoped>
.more {
  display: block;
  height: 50px;
  line-height: 50px;
  color: #666;
  width: 98%;
  text-align: center;
  background-color: #ededed;
  border-radius: 6px;
  transition: 0.3s all;
  margin-left: 10px;
  margin-top: 20px;
}
@media (max-width: 600px) {
  .more {
    width: 95%;
  }
}
</style>
