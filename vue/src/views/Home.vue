<template>
  <el-container class="app-container">
    <navigation-bar></navigation-bar>
    <main-contents></main-contents>
  </el-container>
</template>


<script>
    import NavigationBar from '../components/navigation/NavigationBar.vue'
    import MainContents from '../components/navigation/MainContents.vue'
    export default {
        components : {
            NavigationBar,
            MainContents
        }
    }
</script>

<style scoped lang="scss">

  .app-container {
    position: absolute;
    top: 0px;
    bottom: 0px;
    width: 100%;

    .app-main {
      background: #324057;
      padding:0px;
      position: absolute;
      top: 38px;
      bottom: 0px;

      overflow: hidden;
      width: 100%;

    }

  }

</style>
