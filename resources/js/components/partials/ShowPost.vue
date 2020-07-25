<template>
    <div class="post-container">
        <h1>Show Post</h1>
    </div>
</template>


<script>
export default {
        components:{
        },
        data() {
            return {
                
            }
        },
        methods: { 
        },
}
</script>

<style lang="scss" scoped>
   .post-container{
       width: 400px;
       padding: 10px;
       margin: 0px auto;
        & .back{
           height: 50px;
           width: 50px;
           background-color: white;
        //    line-height: 50px;
           text-align: center;
           text-align: center;
           padding: 10px;
           border-radius: 50%;
           box-shadow: 2px 2px 3px #ccc;
           cursor:pointer;
       }
   }
</style>