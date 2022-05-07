<div class="p-4">
    <h1 class="text-2xl">Department Data</h1>
    <form action="process.php" method="get">
        <table>
            <tr>
                <td>
                    <label for="departement_id">ID</label>
                </td>
                <td>
                    <input type="text" name="departement_id" id="" class="form-input mx-2 p-1 rounded-md">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="departement_name">Name</label>
                </td>
                <td>
                    <input type="text" name="departement_name" id="" class="form-input mx-2 p-1 rounded-md">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="departement_address">Address</label>
                </td>
                <td>
                    <input type="text" name="departement_address" id="" class="form-input mx-2 p-1 rounded-md">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="px-4 py-2 my-4 rounded-md shadow-xl bg-dark text-ext3 hover:bg-ext2 hover:text-dark" value="Save" name="add_departement_data">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <table class="table border-collapse table-auto">
        <tr>
            <th class="bg-ext3 border border-ext2 px-8 py-4">ID</th>
            <th class="bg-ext3 border border-ext2 px-8 py-4">Name</th>
            <th class="bg-ext3 border border-ext2 px-8 py-4">Address</th>
            <th class="bg-ext3 border border-ext2 px-8 py-4">Action</th>
        </tr>
        <?php
                $db = new Database();

                $data = $db->getDepartementData();
                foreach ($data as $index => $item) {
                    echo "<tr>" .
                    "<td class='border border-ext2 py-2 px-4'>" . $item['department_id'] . "</td>" .
                    "<td class='border border-ext2 py-2 px-4'>" . $item['department_name'] . "</td>" .
                    "<td class='border border-ext2 py-2 px-4'>" . $item['department_address'] . "</td>" .
                    "<td class='border border-ext2 py-2 px-4'>" . "<i class='fa fa-trash ml-5'></i><i class='fa fa-pen ml-4'></i>" . "</td>" .
                    "</tr>";
                }
            ?>
    </table>
</div>