<template>
    <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">{{ items.length }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">Você tem {{ items.length }} novas mensagens</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li v-for="item in items">
                        <div class="card">
                            <h4>
                                <small>De: </small>
                                <small> {{ item.email }} </small>
                                <small style="margin-left: 16%;"><i class="fa fa-clock-o"></i> {{ item.hour }}</small>
                            </h4>
                            <h4 class="userSentMessage"><b> {{ item.user }} </b></h4>
                            <p class="userMessage"> {{ item.message }} </p>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="footer"><a href="#">Ver Todas as Mensagens</a></li>
        </ul>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                items: [
                    { user:'Geraldo', email:'geraldo@gmail.com', message: 'Sobre a reunião na próxima semana...', hour:'5pm' },
                    { user:'Marlon', email:'marlon@gmail.com', message: 'Novo processo arquivado', hour:'1pm' },
                    { user:'Rafaela', email:'rafaela@gmail.com', message: 'Upload dos arquivos referentes ao processo #1', hour:'3pm' },
                    { user:'Marlon', email:'marlon@gmail.com', message: 'Cadastro de processo referente ao assistido Elias', hour:'9am' }
                ],
                count: 0,
            }
        },
        mounted() {
            const vm = this;
            /*
            setInterval(() => {
                vm.count++;
            }, 1000);
            */
            vm.count = items.length;
        }
    }
</script>

<style scoped>
.message-item-title {
    margin-left: 0px;
}

.card {
	box-shadow: 0 0px 2px 0 rgba(0,0,0,0.2);
	transition: 0.3s;
	width: 95%;
	border-radius: 5px;
	padding: 16px 16px;
    margin-bottom: 5px;
    margin-left: 2px;
    margin-right: 15px;
}

.card:hover {
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    cursor: pointer;
}

.info {
	display:inline;
	color: grey;
}

.userSentMessage {
	margin-bottom: 10px;
	margin-top: 10px;
}

.userMessage {
	margin-top: 10px;
}

</style>
