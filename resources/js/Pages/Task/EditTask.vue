    <template>
        <div v-if="showEditTask"  class="modal fade show d-block">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Task</h5>
                        <button type="button" class="btn-close" @click="closeEditTask"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updateTask">
                            <div class="mb-3">
                                <label for="taskTitle" class="form-label">Title</label>
                                <input v-model="editTaskForm.title" type="text" class="form-control" id="taskTitle">
                            </div>
                            <div class="mb-3">
                                <label for="taskDescription" class="form-label">Description</label>
                                <input v-model="editTaskForm.description" type="text" class="form-control" id="taskDescription">
                            </div>
                            <div class="mb-3">
                                <label for="taskPriority" class="form-label">Priority</label>
                                <input v-model="editTaskForm.priority" type="text" class="form-control" id="taskPriority">
                            </div>
                            <div class="mb-3">
                                <label for="taskEndDate" class="form-label">End Date</label>
                                <input v-model="editTaskForm.end_date" type="date" class="form-control" id="taskEndDate">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script setup>
    import axios from 'axios';
    import { ref } from 'vue';

    const showEditTask = ref(false);
    const editTaskForm = ref({
        title: '',
        description: '',
        priority: '',
        end_date: '',
    });

    const openEditTask = (task) => {
        editTaskForm.value = { ...task };
        showEditTask.value = true;
    };

    const closeEditTask = () => {
        showEditTask.value = false;
    };

    const updateTask = async () => {
        try {
            const response = await axios.put(`/tasks/${editTaskForm.value.id}`, editTaskForm.value);
            console.log('Task updated:', response.data);
            closeEditTask();
            await fetchTasks(); // Обновляем список задач
        } catch (error) {
            console.error('Ошибка при обновлении задачи:', error);
        }
    };
    </script>
