<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">

              <!-- <form> -->
              <form action="/api/new/user" method="post">

                <div class="form-group">
                  <label>Name</label>
                  <input type="text" v-model="name" name="name" class="form-control" placeholder="Enter Name">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" v-model="email" name="email" class="form-control" placeholder="Enter email">
                </div>

                <button type="submit" @click.prevent="postData" class="btn btn-primary">Submit</button>

                </form>

            </div>
        </div>
    </div>
</template>

<script>

    export default {

        mounted() {
          this.postData()
        },
        data(){
          return{
            name:'',
            email:''
          }
        },
        methods:{
          postData(){
            axios.post('/api/new/user', {
              name: this.name,
              email: this.email
            })
            .then(function (response) {
              console.log(response);
            })
            .catch(function (error) {
              console.log(error);
            });

            this.name ='';
            this.email ='';
          }
        }
    }
</script>
