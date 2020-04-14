<template>
    <ul class="pagination justify-content-end" v-show="pagination.last_page > 1">
        <li v-bind:class="[{disabled: !pagination.previous_page_url}]" class="page-item ">
            <a @click="callPage(1)" class="page-link">
                <i class="fa fa fa-angle-double-left"></i>
            </a>
        </li>
        <li :class="{disabled: !pagination.previous_page_url}" class="page-item">
            <a @click="callPage(pagination.current_page - 1)" class="page-link ">
                <i class="fa fa-angle-left"></i>
            </a>
        </li>
        <!--<li v-for="n in pagination.last_page" :class="{'active': n === pagination.current_page}" class="page-item">-->
        <!--<span @click="callPage(n)" class="page-link " :class="[{'text-white': n === pagination.current_page}, {'pointer': n !== pagination.current_page}, {'disabled': n === pagination.current_page}]" >-->
        <!--{{n}}-->
        <!--</span>-->
        <!--</li>-->
        <li :class="{disabled: !pagination.next_page_url}" class="page-item">
            <a @click="callPage(pagination.current_page + 1)" class="page-link ">
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li :class="{disabled: !pagination.next_page_url}" class="page-item">
            <a @click="callPage(pagination.last_page)" class="page-link ">
                <i class="fa fa fa-angle-double-right"></i>
            </a>
        </li>
    </ul>
</template>
<script>
    export default {
        data(){
            return {
                pagination: {}
            }
        },
        methods: {
            makePagination(meta, links){
                this.pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    previous_page_url: links.prev
                };
            },
            callPage($page){
                if($page !== this.pagination.current_page){
                    this.$emit('changePage', $page)
                }

            }
        }
    }
</script>
