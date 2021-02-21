<template>
  <div id="app" class="container">
    <!--<img alt="Vue logo" src="./assets/logo.png" class="logo">-->
    <todo-list msg="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
import TodoList from './components/TodoList.vue'

export default {
  name: 'App',
  components: {
    TodoList,
  }
}
</script>

<style>

.container{
  max-width: 600px;
  margin:0 auto;
}

.logo {
  display: block;
  margin: 20px auto;
  height: 75px; 
}
</style>
