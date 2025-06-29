// Navigasi Menu
const menuItems = document.querySelectorAll('.menu-item');
const sections = document.querySelectorAll('.section');

menuItems.forEach(item => {
  item.addEventListener('click', (e) => {
    e.preventDefault();
    menuItems.forEach(i => i.classList.remove('active'));
    item.classList.add('active');
    sections.forEach(sec => sec.classList.add('hidden'));
    const target = item.getAttribute('data-section');
    document.getElementById(target).classList.remove('hidden');
  });
});

// Modal dan Form Destinasi
const modal = document.getElementById('destinationModal');
const closeBtn = document.querySelector('.close');
const addBtn = document.getElementById('addDestinationBtn');
const destinationForm = document.getElementById('destinationForm');

addBtn.onclick = () => {
  document.getElementById('modalTitle').textContent = 'Tambah Destinasi';
  destinationForm.reset();
  document.getElementById('destinationId').value = '';
  modal.style.display = 'block';
};

closeBtn.onclick = () => {
  modal.style.display = 'none';
};

window.onclick = (event) => {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
};

// Load Data Destinasi
async function loadDestinations() {
  try {
    const response = await fetch('api/destination/read.php');
    const data = await response.json();
    const tableBody = document.getElementById('destinationTableBody');
    tableBody.innerHTML = '';

    data.records.forEach((destination, index) => {
      const row = `
        <tr>
          <td>${index + 1}</td>
          <td><img src="${destination.image_url}" alt="${destination.name}" width="100"></td>
          <td>${destination.name}</td>
          <td>${destination.location}</td>
          <td>${destination.description}</td>
          <td>
            <button onclick="editDestination(${destination.id})" class="btn-edit">Edit</button>
            <button onclick="deleteDestination(${destination.id})" class="btn-delete">Hapus</button>
          </td>
        </tr>
      `;
      tableBody.innerHTML += row;
    });
  } catch (error) {
    console.error('Error:', error);
    alert('Terjadi kesalahan saat memuat data');
  }
}

async function editDestination(id) {
  try {
    const response = await fetch(`api/destination/read_one.php?id=${id}`);
    const data = await response.json();
    document.getElementById('destinationId').value = data.id;
    document.getElementById('name').value = data.name;
    document.getElementById('location').value = data.location;
    document.getElementById('description').value = data.description;
    document.getElementById('modalTitle').textContent = 'Edit Destinasi';
    modal.style.display = 'block';
  } catch (error) {
    console.error('Error:', error);
    alert('Terjadi kesalahan saat memuat data destinasi');
  }
}

async function deleteDestination(id) {
  if (confirm('Apakah Anda yakin ingin menghapus destinasi ini?')) {
    try {
      const response = await fetch('api/destination/delete.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id })
      });
      const result = await response.json();
      if (response.ok) {
        alert(result.message);
        await loadDestinations();
      } else {
        alert(result.message || 'Gagal menghapus destinasi');
      }
    } catch (error) {
      console.error('Error:', error);
      alert('Terjadi kesalahan saat menghapus destinasi');
    }
  }
}

destinationForm.onsubmit = async (e) => {
  e.preventDefault();
  const destinationId = document.getElementById('destinationId').value;
  const name = document.getElementById('name').value;
  const location = document.getElementById('location').value;
  const description = document.getElementById('description').value;
  const imageFile = document.getElementById('image').files[0];

  try {
    const formData = new FormData();
    if (destinationId) formData.append('id', destinationId);
    formData.append('name', name);
    formData.append('location', location);
    formData.append('description', description);
    if (imageFile) formData.append('image', imageFile);

    const url = destinationId ? 'api/destination/update.php' : 'api/destination/create.php';
    const response = await fetch(url, { method: 'POST', body: formData });
    const result = await response.json();

    if (response.ok) {
      alert(result.message);
      modal.style.display = 'none';
      destinationForm.reset();
      document.getElementById('destinationId').value = '';
      await loadDestinations();
    } else {
      alert(result.message || 'Gagal menyimpan destinasi');
    }
  } catch (error) {
    console.error('Error:', error);
    alert('Terjadi kesalahan saat menyimpan destinasi');
  }
};

// Gallery Modal dan Form
const galleryModal = document.getElementById('galleryModal');
const galleryCloseBtn = galleryModal.querySelector('.close');
const addGalleryBtn = document.getElementById('addGalleryBtn');
const galleryForm = document.getElementById('galleryForm');

addGalleryBtn.onclick = () => {
  document.getElementById('galleryModalTitle').textContent = 'Tambah Foto';
  galleryForm.reset();
  document.getElementById('galleryId').value = '';
  galleryModal.style.display = 'block';
};

galleryCloseBtn.onclick = () => {
  galleryModal.style.display = 'none';
};

async function loadGallery() {
  try {
      const response = await fetch('api/gallery/read.php');
      const data = await response.json();
      const tableBody = document.getElementById('galleryTableBody');
      tableBody.innerHTML = '';

      // Tambahkan data baru di awal tabel
      data.records.forEach((gallery, index) => {
          const row = document.createElement('tr');
          row.innerHTML = `
              <td>${index + 1}</td>
              <td><img src="${gallery.image_url}" alt="Gallery ${index + 1}" width="200"></td>
              <td>
                  <button onclick="editGallery(${gallery.id})" class="btn-edit">Edit</button>
                  <button onclick="deleteGallery(${gallery.id})" class="btn-delete">Hapus</button>
              </td>
          `;
          tableBody.appendChild(row);
      });
  } catch (error) {
      console.error('Error:', error);
      alert('Terjadi kesalahan saat memuat data gallery');
  }
}

async function editGallery(id) {
  document.getElementById('galleryId').value = id;
  document.getElementById('galleryModalTitle').textContent = 'Edit Foto';
  galleryModal.style.display = 'block';
}

async function deleteGallery(id) {
  if (confirm('Apakah Anda yakin ingin menghapus foto ini?')) {
      try {
          const response = await fetch('api/gallery/delete.php', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ id })
          });
          const result = await response.json();
          if (response.ok) {
              alert(result.message);
              await loadGallery();
          } else {
              alert(result.message || 'Gagal menghapus foto');
          }
      } catch (error) {
          console.error('Error:', error);
          alert('Terjadi kesalahan saat menghapus foto');
      }
  }
}

galleryForm.onsubmit = async (e) => {
  e.preventDefault();
  const galleryId = document.getElementById('galleryId').value;
  const imageFile = document.getElementById('galleryImage').files[0];

  if (!imageFile) {
    alert('Pilih foto terlebih dahulu');
    return;
  }

  try {
    const formData = new FormData();
    if (galleryId) formData.append('id', galleryId);
    formData.append('image', imageFile);
    const url = galleryId ? 'api/gallery/update.php' : 'api/gallery/create.php';
    const response = await fetch(url, { method: 'POST', body: formData });
    const result = await response.json();

    if (response.ok) {
      alert(result.message);
      galleryModal.style.display = 'none';
      galleryForm.reset();
      document.getElementById('galleryId').value = '';
      await loadGallery();
    } else {
      alert(result.message || 'Gagal menyimpan foto');
    }
  } catch (error) {
    console.error('Error:', error);
    alert('Terjadi kesalahan saat menyimpan foto');
  }
}

// About Modal dan Form
const aboutModal = document.getElementById('aboutModal');
const aboutCloseBtn = aboutModal.querySelector('.close');
const addAboutBtn = document.getElementById('addAboutBtn');
const aboutForm = document.getElementById('aboutForm');

addAboutBtn.onclick = () => {
  document.getElementById('aboutModalTitle').textContent = 'Tambah Data';
  aboutForm.reset();
  document.getElementById('aboutId').value = '';
  aboutModal.style.display = 'block';
};

aboutCloseBtn.onclick = () => {
  aboutModal.style.display = 'none';
};

async function loadAbout() {
  try {
    const response = await fetch('api/about/read.php');
    const data = await response.json();
    const tableBody = document.getElementById('aboutTableBody');
    tableBody.innerHTML = '';

    data.records.forEach((about, index) => {
      const row = `
        <tr>
          <td>${index + 1}</td>
          <td><img src="${about.foto}" alt="${about.nama_kota}" width="100"></td>
          <td>${about.nama_kota}</td>
          <td>${about.deskripsi}</td>
          <td>
            <button onclick="editAbout(${about.id})" class="btn-edit">Edit</button>
            <button onclick="deleteAbout(${about.id})" class="btn-delete">Hapus</button>
          </td>
        </tr>
      `;
      tableBody.innerHTML += row;
    });
  } catch (error) {
    console.error('Error:', error);
    alert('Terjadi kesalahan saat memuat data');
  }
}

async function editAbout(id) {
  try {
      const response = await fetch(`api/about/read_one.php?id=${id}`);
      const data = await response.json();
      
      if(response.ok && data.nama_kota) {
          document.getElementById('aboutId').value = data.id;
          document.getElementById('nama_kota').value = data.nama_kota;
          document.getElementById('deskripsi').value = data.deskripsi;
          document.getElementById('aboutModalTitle').textContent = 'Edit Data';
          aboutModal.style.display = 'block';
      } else {
          alert(data.message || 'Gagal memuat data');
      }
  } catch (error) {
      console.error('Error:', error);
      alert('Terjadi kesalahan saat memuat data');
  }
}

async function deleteAbout(id) {
  if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
    try {
      const response = await fetch('api/about/delete.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id })
      });
      const result = await response.json();
      if (response.ok) {
        alert(result.message);
        await loadAbout();
      } else {
        alert(result.message || 'Gagal menghapus data');
      }
    } catch (error) {
      console.error('Error:', error);
      alert('Terjadi kesalahan saat menghapus data');
    }
  }
}

aboutForm.onsubmit = async (e) => {
  e.preventDefault();
  const aboutId = document.getElementById('aboutId').value;
  const nama_kota = document.getElementById('nama_kota').value;
  const deskripsi = document.getElementById('deskripsi').value;
  const fotoFile = document.getElementById('foto').files[0];

  try {
    const formData = new FormData();
    if (aboutId) formData.append('id', aboutId);
    formData.append('nama_kota', nama_kota);
    formData.append('deskripsi', deskripsi);
    if (fotoFile) formData.append('foto', fotoFile);

    const url = aboutId ? 'api/about/update.php' : 'api/about/create.php';
    const response = await fetch(url, { method: 'POST', body: formData });
    const result = await response.json();

    if (response.ok) {
      alert(result.message);
      aboutModal.style.display = 'none';
      aboutForm.reset();
      document.getElementById('aboutId').value = '';
      await loadAbout();
    } else {
      alert(result.message || 'Gagal menyimpan data');
    }
  } catch (error) {
    console.error('Error:', error);
    alert('Terjadi kesalahan saat menyimpan data');
  }
};

document.addEventListener('DOMContentLoaded', () => {
  loadDestinations();
  loadGallery();
  loadAbout();
});
