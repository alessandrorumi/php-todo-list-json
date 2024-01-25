<script>
import axios from 'axios';

export default {
  name: 'Tasks',
  data() {
    return {
      tasks: [],
      newTask: '',
    }
  },
  methods: {
    addTask() {
      this.tasks.push(this.newTask);
      this.newTask = '';
    }
  },
  mounted() {
    axios.get('http://localhost/tasksApi.php')
      .then(res => {
        this.tasks = res.data;
      })
      .catch(err => console.error(err));
  }
}
</script>

<template>
  <h1>Task</h1>
  <ul>
    <li v-for="(task, id) in tasks" :key="id" :class="{ 'done-task': task.done }">
      {{ task.name }}
    </li>
  </ul>
</template>


<style scoped>
.done-task {
  text-decoration-line: line-through;
}
</style>

