import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        name:'edit_url',
        path: '/tasks/:id/edit',
        component:() => import('../Pages/Task/EditTask.vue')

    },
]
export default createRouter({
    history: createWebHistory(),
    routes
})
