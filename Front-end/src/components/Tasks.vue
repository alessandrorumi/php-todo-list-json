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
    },

    removeTask(index) {
      const params = {
        index: index
      };

      axios.get('http://localhost/removeTask.php', { params })
        .then(res => {
          this.tasks = res.data;
        })
        .catch(err => console.error(err));
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
      <div class="text">
        {{ task.text }}
      </div>
      <div>
        <button @click="removeTask(index)">Rimuovi</button>
      </div>
    </li>
  </ul>
</template>


<style scoped>
li {
  display: flex;
  align-items: stretch;

  .text {
    width: 75px;
    margin-bottom: 1rem;
  }
}

.done-task {
  text-decoration-line: line-through;
}
</style>

