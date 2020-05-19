var vue1 = new Vue({
    el: '#app1',
    data: {
        title: "Hello World!",
        count: 0,
        secondCounter: 0,
        link: 'http://google.com',
        x: 0,
        y: 0,
        name: 'NgocXinhDep'
    },
    computed: {
        output: function(){
            console.log("output");
            return this.count > 5 ? 'greater than 5': 'smaller than 5'
        }
    },
    methods: {
        sayHello: function(){
            return this.title;
        },
        increase: function(step, event){
            this.count += step;
        },
        updateCoordinate: function(event){
            this.x = event.clientX;
            this.y = event.clientY;
        },
        alertMe: function(){
            alert('Alert!')
        },
        result: function(){
            console.log("result");
            return this.count > 5 ? 'greater than 5': 'smaller than 5'
        }
    }
});
