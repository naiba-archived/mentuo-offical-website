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
              <li>让您的想法
                <strong>照亮现实</strong>
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
              <li>技术扎实，
                <strong>解决方案方案领先</strong>
              </li>
              <li>个性化定制服务</li>
            </ul>
          </el-col>
        </el-row>
      </el-col>
    </div>
    <div class="section" id="example">
      <el-col :sm="{span:20,offset:2}">
        <p class="plain-title">近期案例</p>
        <el-row :gutter="20">
          <el-col v-for="item in cases" :sm="8">
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
        <el-row :gutter="20">
          <a href="#/cases" class="more">查看更多服务案例</a>
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
      cases: data.cases.slice(0, 3)
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
