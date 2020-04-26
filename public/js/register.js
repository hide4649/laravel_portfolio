new Vue({
  el: '#register',
  data: {
      name: '',
      email: '',
      password: '',
      remember: true,
      errors: {}
  },
  methods: {
      register: function(){

          this.errors = {};

          var self = this;
          var url = "/register";
          var params = {
              name: this.name,
              email: this.email,
              password: this.password,
              remember: this.remember,
              
          };
          axios.post(url, params).then(function(response){
                 location.href = '/home';
              })
              .catch(function(error){
                if (error.response.status === 422) {
                  var responseErrors = error.response.data.errors;
                  var errors = {};
                  for(var key in responseErrors) {
                      errors[key] = responseErrors[key][0];
                  }
                  self.errors = errors;
               } else {
                 console.log("もう一度お試しください", error.response);
                }
              });
      }
  }
});
