<template>
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">{{ items.length }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">Você tem {{ items.length }} novas notificações</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li v-for="item in items">
                        <a :href="item.link"> <!-- {{ item.link }}  -->
                            <i :class="item.iconClass"></i> {{ item.message }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="footer"><a href="#">Ver todas as notificações</a></li>
        </ul>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                items: [
                    { link: '#', iconClass: 'fa fa-users text-aqua', message: '5 assistidos cadastrados hoje'},
                    { link: '#', iconClass: 'fa fa-warning text-yellow', message: 'Você alterou seu nome'},
                    { link: '#', iconClass: 'fa fa-users text-red', message: 'Um processo foi arquivado'},
                    { link: '#', iconClass: 'fa fa-shopping-cart text-green', message: '5 Funcionários cadastrados hoje'},
                    { link: '#', iconClass: 'fa fa-user text-red', message: 'Nível de acesso alterado hoje'},
                    { link: '#', iconClass: 'fa fa-user text-yellow', message: '100 Funcionários foram demitidos'}
                ],
                count: 0
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
