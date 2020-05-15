<template>
    <div class="jargon-preview">
        <a :href="slug">
            <h2 class="jargon-title">
                {{ jargon_title }}
            </h2>
            <h3 class="post-subtitle">
                {{ jargon_title }}
            </h3>
        </a>
        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> {{ created_at }} 
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
            'jargon_title','jargon_title','created_at','jargonId','login','likes','jargon_slug'
        ],
        created(){
            this.likeCount = this.likes
        },
        methods:{
            likeIt(){
                if (this.login) {
                    axios.post('/saveLike',{
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
