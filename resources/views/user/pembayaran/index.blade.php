@extends('layouts.user')

@section('title', 'Pembayaran')

@section('page-title', 'Pembayaran')

@section('content')

<div class="payment-page">

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-circle"></i>
            {{ session('error') }}
        </div>
    @endif

    {{-- VALIDATION ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali data pembayaran:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- HEADER --}}
    <div class="payment-header">
        <div>
            <h3>
                <i class="bi bi-credit-card"></i>
                Pembayaran Pesanan
            </h3>

            <p>
                Silakan lakukan pembayaran untuk pesanan Anda.
            </p>
        </div>

        <a
            href="{{ route('user.bouquet.index') }}"
            class="btn-back"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>


    {{-- DETAIL PESANAN --}}
    <div class="payment-card">

        <div class="card-title">
            <i class="bi bi-receipt"></i>
            Detail Pesanan
        </div>

        <div class="detail-grid">

            <div class="detail-item">
                <span>ID Pesanan</span>
                <strong>
                    #{{ $pemesanan->id }}
                </strong>
            </div>

            <div class="detail-item">
                <span>Tanggal Pesanan</span>
                <strong>
                    {{ $pemesanan->tanggal_pemesanan
                        ? \Carbon\Carbon::parse($pemesanan->tanggal_pemesanan)->format('d M Y')
                        : '-' }}
                </strong>
            </div>

            <div class="detail-item">
                <span>Status Pesanan</span>

                <strong class="status">
                    {{ ucfirst($pemesanan->status ?? '-') }}
                </strong>
            </div>

            <div class="detail-item">
                <span>Total Harga</span>

                <strong class="total">
                    Rp {{ number_format($pemesanan->total_harga ?? 0, 0, ',', '.') }}
                </strong>
            </div>

        </div>

    </div>


    {{-- PEMBAYARAN SUDAH ADA --}}
    @if($pemesanan->pembayaran)

        <div class="payment-card">

            <div class="card-title">
                <i class="bi bi-info-circle"></i>
                Status Pembayaran
            </div>

            <div class="payment-status">

                <div class="status-icon">
                    <i class="bi bi-hourglass-split"></i>
                </div>

                <div>
                    <h4>
                        Pembayaran Sudah Dikirim
                    </h4>

                    <p>
                        Metode:
                        <strong>
                            {{ ucfirst($pemesanan->pembayaran->metode_pembayaran) }}
                        </strong>
                    </p>

                    <p>
                        Jumlah:
                        <strong>
                            Rp {{ number_format(
                                $pemesanan->pembayaran->jumlah_bayar,
                                0,
                                ',',
                                '.'
                            ) }}
                        </strong>
                    </p>

                    <span class="payment-badge">
                        {{ ucfirst($pemesanan->pembayaran->status) }}
                    </span>
                </div>

            </div>

        </div>

    @else

        {{-- FORM PEMBAYARAN --}}
        <div class="payment-card">

            <div class="card-title">
                <i class="bi bi-wallet2"></i>
                Form Pembayaran
            </div>

            <form
                action="{{ route(
                    'user.pembayaran.store',
                    $pemesanan->id
                ) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- METODE --}}
                <div class="form-group">

                    <label>
                        Metode Pembayaran
                    </label>

                    <select
                        name="metode_pembayaran"
                        required
                    >
                        <option value="">
                            -- Pilih Metode Pembayaran --
                        </option>

                        <option value="transfer">
                            Transfer Bank
                        </option>

                        <option value="cash">
                            Cash
                        </option>
                    </select>

                </div>


                {{-- JUMLAH --}}
                <div class="form-group">

                    <label>
                        Jumlah Pembayaran
                    </label>

                    <input
                        type="number"
                        name="jumlah_bayar"
                        value="{{ old(
                            'jumlah_bayar',
                            $pemesanan->total_harga
                        ) }}"
                        min="0"
                        required
                    >

                </div>


                {{-- BUKTI --}}
                <div class="form-group">

                    <label>
                        Bukti Pembayaran
                    </label>

                    <input
                        type="file"
                        name="bukti_pembayaran"
                        accept=".jpg,.jpeg,.png"
                    >

                    <small>
                        Upload bukti pembayaran jika melakukan
                        transfer.
                    </small>

                </div>


                {{-- BUTTON --}}
                <div class="form-action">

                    <button
                        type="submit"
                        class="btn-payment"
                    >
                        <i class="bi bi-send"></i>
                        Kirim Pembayaran
                    </button>

                </div>

            </form>

        </div>

    @endif

</div>


<style>

.payment-page {
    max-width: 950px;
    margin: 0 auto;
}

.payment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.payment-header h3 {
    color: #6b4c4c;
    font-weight: 700;
    margin-bottom: 5px;
}

.payment-header h3 i {
    color: #d4758a;
    margin-right: 8px;
}

.payment-header p {
    color: #999;
    margin: 0;
}

.btn-back {
    text-decoration: none;
    color: #6b4c4c;
    background: #fff;
    border: 1px solid #eadfe2;
    padding: 10px 16px;
    border-radius: 10px;
}

.payment-card {
    background: #fff;
    border-radius: 16px;
    padding: 25px;
    margin-bottom: 20px;
    border: 1px solid #eee;
    box-shadow: 0 5px 20px rgba(0,0,0,.04);
}

.card-title {
    font-size: 17px;
    font-weight: 700;
    color: #6b4c4c;
    padding-bottom: 18px;
    margin-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.card-title i {
    color: #d4758a;
    margin-right: 8px;
}

.detail-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.detail-item span {
    display: block;
    font-size: 12px;
    color: #999;
    margin-bottom: 6px;
}

.detail-item strong {
    color: #444;
}

.detail-item .total {
    color: #d4758a;
    font-size: 20px;
}

.status {
    color: #d4758a !important;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: 600;
    color: #555;
    margin-bottom: 8px;
}

.form-group select,
.form-group input {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #ddd;
    border-radius: 10px;
    outline: none;
    font-family: inherit;
}

.form-group select:focus,
.form-group input:focus {
    border-color: #e8a6b7;
}

.form-group small {
    display: block;
    margin-top: 6px;
    color: #999;
}

.btn-payment {
    border: none;
    background: #e8a6b7;
    color: white;
    padding: 13px 22px;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
}

.btn-payment:hover {
    background: #d77f98;
}

.form-action {
    text-align: right;
}

.payment-status {
    display: flex;
    align-items: center;
    gap: 20px;
}

.status-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    background: #fff1f4;
    color: #d4758a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
}

.payment-status h4 {
    color: #6b4c4c;
    margin-bottom: 8px;
}

.payment-status p {
    color: #777;
    margin: 4px 0;
}

.payment-badge {
    display: inline-block;
    margin-top: 8px;
    padding: 6px 12px;
    background: #fff1f4;
    color: #d4758a;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.alert {
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 20px;
}

.alert-success {
    background: #edf8f1;
    color: #2e7d4f;
}

.alert-danger {
    background: #fff0f0;
    color: #b84242;
}

@media (max-width: 600px) {

    .payment-header {
        align-items: flex-start;
        gap: 15px;
        flex-direction: column;
    }

    .detail-grid {
        grid-template-columns: 1fr;
    }

    .payment-status {
        align-items: flex-start;
    }

}

</style>

@endsection