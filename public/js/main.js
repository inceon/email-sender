var app = new Vue({
    el: '#emails',
    data: {
        forms: []
    },
    methods: {
        change: function (id) {
            if (typeof this.forms[id] === 'undefined') {
                this.forms[id] = true;
            } else {
                this.forms[id] = !this.forms[id];
            }
            this.$forceUpdate();
        },

        deleteEmail: function (id, token) {
            console.log(id);
            this.$http
                .delete('email/' + id, {
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                })
                .then(response => {

                    location.reload();

                });
        }
    }
})