import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/tasks/:id/edit',
        name:'edit_url',
        component:() => import('../Pages/Task/EditTask.vue')

    }
]
export default createRouter({
    history: createWebHistory(),
    routes
})
