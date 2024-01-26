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

      const params = {
        text: this.newTask
      };

      axios.get('http://localhost/pushTask.php', { params })
        .then(res => {
          this.tasks = res.data;
          this.newTask = '';
        })
        .catch(err => console.error(err));
      // this.newTask = '';
    }
  },
  mounted() {
    axios.get('http://localhost/getTasks.php')
      .then(res => {
        this.tasks = res.data;
      })
      .catch(err => console.error(err));
  }
}
</script>

<template>
  <h1>Task</h1>
  <form @submit.prevent="addTask">
    <input type="text" name="text" v-model="newTask">
    <button type="submit">Aggiungi</button>
  </form>
  <ul>
    <li v-for="(task, id) in tasks" :key="id" :class="{ 'done-task': task.done }">
      {{ task.text }}
    </li>
  </ul>
</template>


<style scoped>
.done-task {
  text-decoration-line: line-through;
}
</style>

