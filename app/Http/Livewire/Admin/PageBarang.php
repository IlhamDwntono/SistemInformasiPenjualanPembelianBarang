<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use App\Models\Diskon;
use Livewire\Component;
use App\Models\Category;
use App\Models\FotoBarang;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PageBarang extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = "";
    public $row = 10;
    public $alert = false;
    // Modal Item
    public $addItem = false, $editItem = false, $hapusItem = false, $itemID, $kategoriItem = false;
    // item field table barang
    public $foto, $nama_produk, $harga_produk, $deskripsi_produk, $kategori_produk, $updateFoto, $stock;
    public $categoryAll;
    public function render()
    {
        $barang = Barang::with('category')->limit(5)->paginate($this->row);
        if ($this->search != null) {
            $barang = Barang::where('user_id', Auth::user()->id)
                ->where('nama_produk', 'like', '%' . $this->search . '%')
                ->paginate($this->row);
        }
        $this->categoryAll = Category::all();
        return view('livewire.admin.page-barang', [
            'barang' => $barang,
            'kategory' => Category::all(),
        ]);
    }

    // fungsi Tutup Modal
    public function closeModal()
    {
        $this->addItem = false;
        $this->editItem = false;
    }
    // Fungsi Modal
    // Tampilkan Modal

    public function saved()
    {
        $this->render();
    }

    public function addingItem()
    {
        $this->addItem = true;
    }
    // Crud Barang
    // Tambah Data Barang
    public function create()
    {
        $valid = $this->validate([
            'foto' => 'image|max:2040',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
            'kategori_produk' => 'required',
        ]);
        $filename = $this->foto->getClientOriginalName();
        $explod = explode('.', $filename);
        $randomize = md5($this->nama_produk) . '.' .  $this->foto->getClientOriginalName();
        // dd($randomize);
        $this->foto->storeAs('upload', $randomize);
        // dd($randomize);
        // melakukan return foto
        $barang = Barang::create([
            'user_id' => Auth::user()->id,
            'foto_produk' => $randomize,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga_produk,
            'deskripsi' => $this->deskripsi_produk,
            'categories' => $this->kategori_produk,
            'stock' => $this->stock,
        ]);

        if ($barang) {
            Alert::info('Info', 'Berhasil');
            $this->addItem = false;
            $this->alert = true;
        }
    }

    // Mengedit File Barang
    public function editModal($id)
    {
        $barang = Barang::find($id);
        $this->itemID = $barang->id;
        $this->foto = $barang->foto_produk;
        $this->nama_produk = $barang->nama_produk;
        $this->harga_produk = $barang->harga;
        $this->deskripsi_produk = $barang->deskripsi;
        $this->kategori_produk = $barang->categories;
        $this->stock = $barang->stock;
        $this->editItem = true;
    }

    public function EditBarang($id)
    {
        $randomize = '';
        $getIDfoto = Barang::find($id);
        $namaFoto = $getIDfoto->foto_produk;
        $randomize = $namaFoto;
        if ($this->updateFoto != null) {
            // dd($this->updateFoto);
            if (Storage::exists(public_path('upload/' . $namaFoto))) {
                Storage::delete(public_path('upload/' . $namaFoto));
            }
            $filename = $this->updateFoto->getClientOriginalName();
            $explod = explode('.', $filename);
            $randomize = $this->nama_produk . '.' .  $this->foto->getClientOriginalName();
            $this->updateFoto->storeAs('upload', $randomize);
        }

        $this->validate([
            // 'foto' => 'image|max:2040',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
            'stock' => 'required',
            'kategori_produk' => 'required',
        ]);

        // dd($randomize);
        // melakukan return foto
        $barang = Barang::where('id', $id)->update([
            'foto_produk' => $randomize,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga_produk,
            'deskripsi' => $this->deskripsi_produk,
            'stock' => $this->stock,
            'categories' => $this->kategori_produk,
        ]);
        Alert::info('Info', 'Berhasil');
        $this->editItem = false;
        $this->alert = true;
    }

    public function hapusModal($id)
    {
        $this->hapusItem = true;
        $this->itemID = Barang::find($id)->id;
    }
    public function HapusBarang($id)
    {
        $barang = Barang::find($id);
        $hapus = $barang->delete();
        Alert::info('Info', 'Berhasil');
        $this->hapusItem = false;
        $this->itemID = null;
        $this->alert = true;
    }

    // Crud Kategori
    // Tampilkan Data Kategori
    public $nama_kategory;
    public function ShowKategori()
    {
        $this->kategoriItem = true;
    }
    public function TambahKategori()
    {
        $valid = $this->validate([
            'nama_kategory' => 'required',
        ]);
        $data = Category::create([
            'kategory' => $this->nama_kategory,
        ]);
        Alert::info('Info', 'Berhasil');
        $this->nama_kategory = '';
    }
    public function HapusKategori($id)
    {
        $data = Category::find($id)->delete();
        Alert::info('Info', 'Berhasil');
    }

    // Diskon
    public $diskonItem = false, $diskonCek, $diskonData;
    public $tgl_mulai, $tgl_kadaluarsa, $jumlah_diskon;
    public function Diskon($id)
    {
        $barang = Barang::find($id);
        $this->nama_produk = $barang->nama_produk;
        $this->itemID = $barang->id;
        $diskon = Diskon::where('barang_id', '=', $barang->id)->get();
        foreach ($diskon as $item) {
            $this->itemID = $item->id;
            $this->nama_produk = $item->barang_id;
            $this->jumlah_diskon = $item->diskon;
            $this->tgl_kadaluarsa = $item->tgl_kadaluarsa;
            $this->tgl_mulai = $item->tgl_mulai;
        }
        $this->diskonData = $diskon;
        if ($diskon->count() > 0) {
            $this->diskonCek = false;
        } else {
            $this->diskonCek = true;
        }
        $this->diskonItem = true;
    }
    public function TambahDiskon()
    {
        $this->validate([
            'jumlah_diskon' => 'required',
            'tgl_mulai' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);
        $diskon = Diskon::create([
            'barang_id' => $this->itemID,
            'diskon' => $this->jumlah_diskon,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_kadaluarsa' => $this->tgl_kadaluarsa,
        ]);
        $this->diskonItem = false;
        Alert::info('Info', 'Berhasil');
    }
    public function hapusDiskon($id)
    {
        Diskon::find($id)->delete();
        $this->diskonItem = false;
        Alert::success('Diskon', 'Dihapus');
    }
    public function Promo()
    {
        return redirect()->route('Admin.Promo');
    }
}
