var cmp = {
    data: function () {
        return { status: 'Critical' };
    },
    template: '<p>Server Status: {{ status }} (<button @click="changeStatus"> Change </button>)</p>',
    methods: {
        changeStatus: function () {
            this.status = 'normal';
        }
    }
};
new Vue({
    el: '#app',
    components: {
        'my-cmp': cmp
    }
});

new Vue({
    el: '#app2',
    components: {
        'my-cmp': cmp
    }
});
