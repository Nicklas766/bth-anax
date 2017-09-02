<div class='wrapper' style="background:#F0F0F0; min-height:900px;">

    <div class='login-widget' style="background:blue;">
    <table style="margin:auto;">
         <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Authority</th>
        </tr>
             <tr>
                 <td><img src="<?= $user["img"] ?>" style="height:100px; width:100%;"></td>
                 <td><?= $user["name"] ?></td>
                 <td><?= $user["email"] ?></td>
                 <td><?= $user["authority"] ?></td>
            </tr>

    </table>

        <form action'<?=$app->link("admin/users/$user[name]")?>' method="post">
             <textarea style="border:1px solid;" type="text" placeholder="email" name="email"><?= $user["email"] ?></textarea>
             <select name="authority" required>
               <option value="user">User</option>
               <option value="admin">Admin</option>
             </select>
             <button type="submit">Uppdatera</button>
        </form>
        <a href='<?= $app->link("admin/user/delete/$user[name]")?>'> ta bort </a>
    </div>

</div>
