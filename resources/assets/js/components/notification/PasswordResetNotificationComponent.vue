<style scoped>
</style>
<template>
     <div class="panel panel-default">
                <div class="panel-heading">SMS Password Notification 
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                    Close</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a> 
                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a>

                </div>

                <div class="panel-body">


                    <form action="/sms-password-notification/send" method="POST">
                      
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="branch">Branch</label>
                                        <v-select v-model="selected_branch" label="name" :options="branches" @select="getBranchEmployees"></v-select>                    
                                <p>{{selected_branch}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee">Employee</label>
                                      <v-select v-model="E label="name" :options="employees"></v-select>                        
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone-no">Phone Number</label>
                                    <input type="text" class="form-control" id="phone-no" name="phone_no" placeholder="0911******" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="notification-new-password">New Password</label>
                                <div class="input-group">
                                    <!--  -->
                                    <input type="text" class="form-control" id="notification-new-password" name="password" placeholder="password">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="button" id="password_generate">
                                    <i class="fa fa-cogs"></i>
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="msg-templete">Message Templete</label>
                            <select name="msg-templete" class="form-control" id="msg-templete" v-model="selected_templete">
                              <option v-for="message_templete in message_templetes"  v-bind:value="message_templete.templete">{{message_templete.name}}</option>                           
                            </select>
                            <p>{{selected_templete}}</p>
                        </div>

                        <div class="form-group">
                            <label for="msg">Message</label>
                            <textarea class="form-control" id="msg" name="msg" rows="3"  v-model="selected_templete">
                                
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-md">Send</button>
                    </form>
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>
</template>
<script>
export default {
    data () {
        return {
            branches:[],
            employees:[],
            message_templetes:[],
            selectedEmployee:'',
            selected_branch:null, 
            selected_templete:null
           
            
        }
    },
    mounted() {
        this.getBranches();
        this.getMessageTempletes();
        this.getBranchEmployees();
    },
    watch(){
se
    },
    methods:{
        getBranches(){
            axios.get('/api/branches')
                .then(response=>{
                    console.log(response.data);
                    this.branches=response.data.data;
                });
        },
        getBranchEmployees(){
            console.log(this.selected_branch);
            if(this.selected_branch!==null){
                
                axios.get('/api/employees/'+this.selected_branch.id)
                .then(response=>{
                    console.log(response.data);
                    this.employees=response.data.data;
                })
            }
         
        },
        getEmployee(employee){

        },
        getMessageTempletes(){
            axios.get('/api/message-templetes')
            .then(response=>{
                 console.log(response.data);
                this.message_templetes=response.data.data;
            })
        }
    }
}
</script>
