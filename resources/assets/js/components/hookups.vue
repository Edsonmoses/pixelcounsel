<template>
    <div class="hookup-preview">
        <a :href="job_slug">
            <h2 class="hookup-title">
                {{company}}
            </h2>
            <h3 class="hookup-subtitle">
                {{position}}
            </h3>
        </a>
        <p class="hookup-meta">Posted by <a href="#">Start Bootstrap</a> {{ created_at }} 
            <a href="" @click.prevent="likeIt">
                <small>{{ likeCount }}</small>
                <i class="fa fa-thumbs-up" v-if="likeCount == 0" aria-hidden="true"></i>
                <i class="fa fa-thumbs-up" style="color:red" v-else="likeCount > 0 " aria-hidden="true"></i>
            </a>
        </p>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                likeCount:0
            }
        },
        props:[
            'company','position','created_at','hookupId','login','likes','job_slug'
        ],
        created(){
            this.likeCount = this.likes
        },
        methods:{
            likeIt(){
                if (this.login) {
                    axios.hookup('/saveLike',{
                        id : this.postId
                    })
                      .then(response => {
                        if (response.data == 'deleted') {
                            this.likeCount -= 1;
                        }else{
                            this.likeCount += 1;
                        }
                        // this.blog = response.data.data
                        // console.log(response);
                      })
                      .catch(function (error) {
                        console.log(error);
                      });
                }else{
                    window.location = 'login'
                }
            }
        }
    }
</script>
