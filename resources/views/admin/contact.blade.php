@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Messages de Contact</h2>

            <ul class="nav nav-tabs flex-column flex-md-row" id="contactTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab0" data-bs-toggle="tab" data-bs-target="#received" type="button" role="tab">Messages reçus</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab1" data-bs-toggle="tab" data-bs-target="#testform" type="button" role="tab">Formulaire test</button>
                </li>
            </ul>

            <div class="tab-content mt-4" id="contactTabContent">
                <!-- Panel 1 : Messages reçus -->
                <div class="tab-pane fade show active" id="received" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jean Dupont</td>
                                    <td>jean@mail.com</td>
                                    <td>Bonjour, j’aimerais avoir un devis...</td>
                                </tr>
                                <!-- D'autres messages ici -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Panel 2 : Formulaire test -->
                <div class="tab-pane fade" id="testform" role="tabpanel">
                    <form>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-success">Envoyer test</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .nav-tabs .nav-link {
        white-space: nowrap;
    }
</style>
@endsection
