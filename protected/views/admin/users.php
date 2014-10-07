<div id="users">
    <button>All users</button>
    <button>Users with roles</button>
    <br/>
    &nbsp;
    <?php for($i=0;$i<10;$i++) { ?>
    <div class="user-list">
        <span class="user-name">User</span>
        <select class="role-list">
            <option value="0">All roles</option>
        </select>
        <div id="invisible">&nbsp;</div>
        <button class="role-bnt">Role</button>
    </div>
    <?php } ?>
</div>
