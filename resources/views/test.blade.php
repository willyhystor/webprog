<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
        </tr>
        <?php
            foreach ($items as $key => $value)
            {
            ?>
                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['price']; ?></td>
                    <a href="{{ url('/delete/'.$value['id']) }}"><td><button>Delete</button></td></a>
                </tr>
            <?php
            }
        ?>
    </table>
    <br>
    <form method="get" action="{{  url('/insert') }}">
        <input type="text" name="name" id="name_id" placeholder="Input name">
        <input type="text" name="price" id="price_id" placeholder="Input price">
        <button>Insert</button>
    </form>

    <br>
    <form method="get" action="{{  url('/update') }}">
        <input type="number" name="id" id="id_id" placeholder="Input id">
        <input type="text" name="name" id="name_id" placeholder="Input name">
        <input type="text" name="price" id="price_id" placeholder="Input price">
        <button>Insert</button>
    </form>
</body>
</html>