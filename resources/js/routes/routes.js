const GuestLayout = ()  => import('../layouts/Guest.vue');
export default [
    {
        path: '/',
        component: GuestLayout,
    },
    {
        path: "/:pathMatch(.*)*",
        name: 'NotFound',
        component: () => import("../views/errors/404.vue"),
    },
];
