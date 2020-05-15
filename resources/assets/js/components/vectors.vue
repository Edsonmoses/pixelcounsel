<template>
    <div class="vectors-preview">
        <a :href="vectors_slug">
            <h2 class="vectors-title">
                {{ vectors_title }}
            </h2>
            <h3 class="vectors-subtitle">
                {{ vectors_type }}
            </h3>
        </a>
        <p class="vectors-meta">Posted by <a href="#">PixelCounsel</a> {{ created_at }} 
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
            'vectors_title','vectors_type','created_at','vectorId','login','likes','vectors_slug'
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
