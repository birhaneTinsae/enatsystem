<style scoped>
</style>
<template>
    <div>
        <div class="panel panel-default">
                <div class="panel-heading">SMS Password Notification                    
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    <a href="/sms-password-notification/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> 
                </div>

                <div class="panel-body">                  
                    <table class="table table-striped" v-if="notifications.length > 0">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Message</th>
                                <th>Sender</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr v-for="(notification,index) in notifications" :key="index">
                                <td>{{index}}</td>
                                <td>{{notification.message}}</td>
                                <td>{{notification.sender}}</td>
                                <td>{{notification.created_at}}</td>
                            </tr>
                           
                        </tbody>
                    </table>                    
                    <div class="jumbotron " v-else>
                        <div class="container">
                            <h1 class="display-4">Notification Empty</h1>
                            <p class="lead">No Notification yet.</p>
                        </div>
                    </div>
                   
                </div>
                <div class="panel-footer">
              
                </div>
            </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            notifications:[]
        }
    },
    mounted() {
        this.prepareComponent();
    },
    methods: {
        prepareComponent() {
            this.getNotifications();
        },
        getNotifications(){
             axios.get('/sms-password-notifications')
                        .then(response => {
                            console.log(response);
                            this.notifications = response.data.data;

                        });
       
        }
    }
}
</script>


