<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Product</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0  bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>Name</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Action</th>
                </tr>
                </thead>
                    <td>Fruits</td>
                    <td>$100</td>
                    <td>Kg</td>
                    <td><button data-bs-toggle="modal" data-bs-target="#update-modal">Edit</button></td>
                    <td><button data-bs-toggle="modal" data-bs-target="#delete-modal">Delete</button></td>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
