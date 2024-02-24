import { createRouter, createWebHistory } from "vue-router";
const CampList = () => import("./components/camp/List.vue");
const CampCreate = () => import("./components/camp/Add.vue");
const CampEdit = () => import("./components/camp/Edit.vue");
const UnitList = () => import("./components/unit/List.vue");
const UnitCreate = () => import("./components/unit/Add.vue");
const UnitEdit = () => import("./components/unit/Edit.vue");

export const routes = [
    {
        name: "home",
        path: "/",
        component: CampList,
    },
    {
        name: "campList",
        path: "/camp",
        component: CampList,
    },
    {
        name: "campEdit",
        path: "/camp/:id/edit",
        component: CampEdit,
    },
    {
        name: "campAdd",
        path: "/camp/add",
        component: CampCreate,
    },
    {
        name: "unitList",
        path: "/unit",
        component: UnitList,
    },
    {
        name: "unitEdit",
        path: "/unit/:id/edit",
        component: UnitEdit,
    },
    {
        name: "unitAdd",
        path: "/unit/add",
        component: UnitCreate,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
