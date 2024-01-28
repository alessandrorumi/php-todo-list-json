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

      const data = {
        text: this.newTask
      };

      const config = {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      };

      axios.post('http://localhost/pushTask.php', data, config)
        .then(res => {
          this.tasks = res.data;
          this.newTask = '';
        })
        .catch(err => console.error(err));
    },

    removeTask(id) {
      const params = {
        id: id
      };

      axios.get('http://localhost/removeTask.php', { params })
        .then(res => {
          this.tasks = res.data;
        })
        .catch(err => console.error(err));
    },

    toggleTask(id) {
      const params = {
        id: id
      };

      axios.get('http://localhost/toggleTask.php', { params })
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
  <div class="container col-md-6 mt-5">
    <h1 class="display-4">Task</h1>
    <form @submit.prevent="addTask" class="form-group mb-3">
      <div class="input-group">
        <input type="text" name="text" v-model="newTask" class="form-control">
        <button type="submit" class="btn btn-primary">Aggiungi</button>
      </div>
    </form>
    <ul class="list-group">
      <li v-for="(task, id) in tasks" :key="id" :class="{ 'done-task': task.done }" class="list-group-item">
        <div class="text" @click="toggleTask(id)">
          {{ task.text }}
        </div>
        <div>
          <button @click="removeTask(id)" type="button" class="btn-close"></button>
        </div>
      </li>
    </ul>
  </div>
</template>

<style scoped>
li {
  display: flex;
  align-items: center;

  .text {
    flex-grow: 1;
  }
}

.done-task {
  text-decoration-line: line-through;
}
</style>



