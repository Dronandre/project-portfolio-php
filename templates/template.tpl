<style>
    .main{
        background-color: coral;
        padding: 50px;
        display: flex;
    }

    .aside {
        background-color: green;
        width: 300px;
        height: 800px;
        font-size: 32px;
        color: red;
    }

    .content {
        background-color: white;
        width: 600px;
        height: 800px;
        font-size: 32px;
        color: black;
    }



</style>


<main class="main">
    <aside class="aside">
        Sidebar
    </aside>

    <div class="content">
        <?php echo $content ?>
    </div>
</main>