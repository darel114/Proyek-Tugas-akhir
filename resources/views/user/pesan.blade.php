@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="bulletin-header text-center mb-5 animate__animated animate__fadeInDown">
        <h2 class="display-4 fw-bold text-dark">Bulletin Board</h2>
        <p class="lead text-muted">Share your thoughts and ideas with the community</p>
        <button class="btn btn-primary btn-lg mt-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#pesanModal">
            <i class="fas fa-plus me-2"></i>Add New Note
        </button>
    </div>

    <div id="pesanList" class="row row-cols-1 row-cols-md-3 g-4">
    </div>
</div>

<div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="pesanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <form id="pesanForm">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="pesanModalLabel">Add New Note</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="editIndex">
                    <div class="mb-3">
                        <label for="pesanInput" class="form-label fw-bold">Your Message</label>
                        <textarea class="form-control shadow-sm" id="pesanInput" rows="4" placeholder="Write your message here..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Note</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="detailModalLabel">Note Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <h6 id="detailNama" class="fw-bold mb-3"></h6>
                <p id="detailPesan" class="text-muted"></p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .bulletin-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-bulletin {
        background: #ffffff;
        border: none;
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15), inset 0 2px 4px rgba(255, 255, 255, 0.9);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
        position: relative;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        cursor: pointer;
        padding: 1.5rem;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><rect fill="none" stroke="%23ddd" stroke-width="2" x="1" y="1" width="100%" height="100%"/><rect fill="%23f0f4f8" fill-opacity="0.3" x="5" y="5" width="calc(100% - 10px)" height="calc(100% - 10px)"/></svg>');
        background-size: cover;
    }

    .card-bulletin:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.25);
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><rect fill="none" stroke="%23007bff" stroke-width="2" x="1" y="1" width="100%" height="100%"/><rect fill="%23e0e7ff" fill-opacity="0.4" x="5" y="5" width="calc(100% - 10px)" height="calc(100% - 10px)"/></svg>');
    }

    .card-bulletin::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, #007bff, #00d4ff);
        border-radius: 1rem 1rem 0 0;
        z-index: 1;
    }

    .card-bulletin .card-body {
        padding: 1.75rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        z-index: 2;
    }

    .card-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #1a3c34;
        margin-bottom: 0.75rem;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        letter-spacing: 0.02em;
    }

    .card-text {
        font-size: 1rem;
        color: #4b5e6e;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.6;
        font-family: 'Inter', sans-serif;
    }

    .card-footer-buttons {
        padding: 1rem 1.75rem;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.95) 0%, rgba(245, 247, 250, 0.95) 100%);
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .btn-edit, .btn-delete {
        font-size: 0.9rem;
        padding: 0.5rem 1.2rem;
        border-radius: 2rem;
        transition: all 0.3s ease;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .btn-edit {
        background: linear-gradient(45deg, #ffd700, #ffec99);
        color: #1a3c34;
        border: none;
    }

    .btn-delete {
        background: linear-gradient(45deg, #ff4d4f, #ff7875);
        color: white;
        border: none;
    }

    .btn-edit:hover, .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .empty-state {
        background: linear-gradient TLS

        .empty-state {
            background: linear-gradient(145deg, #ffffff 0%, #f6f9fc 100%);
            border-radius: 1rem;
            padding: 4rem;
            text-align: center;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
            border: 2px solid #e0e7ff;
        }

        .empty-state h5 {
            font-size: 1.8rem;
            color: #1a3c34;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .empty-state p {
            font-size: 1.2rem;
            color: #4b5e6e;
            font-family: 'Inter', sans-serif;
        }

        .modal-content {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
        }

        textarea.form-control {
            border-radius: 0.5rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        textarea.form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.3);
        }
    }
    </style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userName = @json(auth()->user()->name);
        const userId = @json(auth()->user()->id);
        const localKey = `pesan_user_${userId}`;
        const pesanList = document.getElementById('pesanList');
        const pesanForm = document.getElementById('pesanForm');
        const pesanInput = document.getElementById('pesanInput');
        const editIndexInput = document.getElementById('editIndex');

        let pesanData = JSON.parse(localStorage.getItem(localKey)) || [];

        function renderPesan() {
            pesanList.innerHTML = '';

            if (pesanData.length === 0) {
                pesanList.innerHTML = `
                    <div class="col-12">
                        <div class="empty-state animate__animated animate__fadeIn">
                            <h5>No Notes Yet</h5>
                            <p>Click the <strong>Add New Note</strong> button to share yourartamento first message!</p>
                        </div>
                    </div>
                `;
                return;
            }

            pesanData.forEach((item, index) => {
                const col = document.createElement('div');
                col.className = 'col animate__animated animate__fadeIn';
                col.innerHTML = `
                    <div class="card card-bulletin" onclick="lihatDetail(${index})">
                        <div class="card-body">
                            <h5 class="card-title">${item.nama}</h5>
                            <p class="card-text">${item.pesan}</p>
                        </div>
                        <div class="card-footer-buttons">
                            <button class="btn btn-edit" onclick="event.stopPropagation(); editPesan(${index})">Edit</button>
                            <button class="btn btn-delete" onclick="event.stopPropagation(); hapusPesan(${index})">Delete</button>
                        </div>
                    </div>
                `;
                pesanList.appendChild(col);
            });
        }

        window.editPesan = function(index) {
            const data = pesanData[index];
            pesanInput.value = data.pesan;
            editIndexInput.value = index;
            document.getElementById('pesanModalLabel').innerText = 'Edit Note';
            const modal = new bootstrap.Modal(document.getElementById('pesanModal'));
            modal.show();
        }

        window.hapusPesan = function(index) {
            if (confirm("Are you sure you want to delete this note?")) {
                pesanData.splice(index, 1);
                localStorage.setItem(localKey, JSON.stringify(pesanData));
                renderPesan();
            }
        }

        window.lihatDetail = function(index) {
            const data = pesanData[index];
            document.getElementById('detailNama').innerText = `From: ${data.nama}`;
            document.getElementById('detailPesan').innerText = data.pesan;
            const modal = new bootstrap.Modal(document.getElementById('detailModal'));
            modal.show();
        }

        pesanForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const isiPesan = pesanInput.value.trim();
            const editIndex = editIndexInput.value;

            if (isiPesan === '') return;

            if (editIndex !== '') {
                pesanData[editIndex].pesan = isiPesan;
            } else {
                pesanData.push({
                    nama: userName,
                    user_id: userId,
                    pesan: isiPesan,
                    waktu: new Date().toISOString()
                });
            }

            localStorage.setItem(localKey, JSON.stringify(pesanData));
            pesanForm.reset();
            editIndexInput.value = '';
            document.getElementById('pesanModalLabel').innerText = 'Add New Note';
            bootstrap.Modal.getInstance(document.getElementById('pesanModal')).hide();
            renderPesan();
        });

        renderPesan();
    });
</script>
@endsection