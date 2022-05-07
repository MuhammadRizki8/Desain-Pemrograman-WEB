<div class="p-4">
        <h1 class="text-2xl">Company Information</h1>
        <form action="process.php" method="get">
            <table>
                <tr>
                    <td>
                        <label for="data">Data</label>
                    </td>
                    <td>
                        <input type="text" name="data" id="data" class="form-input mx-2 p-1 rounded-md">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="value">Value</label>
                    </td>
                    <td>
                        <input type="text" name="value" id="value" class="form-input mx-2 p-1 rounded-md">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="px-4 py-2 my-4 rounded-md shadow-xl bg-dark text-ext3 hover:bg-ext2 hover:text-dark" value="Save" name="add_company_data">
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <table class="table border-collapse table-auto">
            <tr>
                <th class="bg-ext3 border border-ext2 px-8 py-4">Data</th>
                <th class="bg-ext3 border border-ext2 px-8 py-4">Value</th>
                <th class="bg-ext3 border border-ext2 px-8 py-4">Action</th>
            </tr>
            <?php
                $db = new Database();

                $data = $db->getCompanyData();
                foreach ($data as $index => $item) {
                    echo "<tr>" .
                    "<td class='border border-ext2 py-2 px-4'>" . $item['data'] . "</td>" .
                    "<td class='border border-ext2 py-2 px-4'>" . $item['value'] . "</td>" .
                    "<td class='border border-ext2 py-2 px-4'>" . "<a href='process.php?id={$item['id']}'>" . "<i class='fa fa-trash ml-5'></i>" . "</a> " . "<i class='fa fa-pen ml-4'></i>" . "</td>" .
                    "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
