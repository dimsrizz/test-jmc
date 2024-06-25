<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalButtons = document.querySelectorAll('[data-modal-target]');
        const closeButtons = document.querySelectorAll('[data-modal-hide]');
        const deleteButtons = document.querySelectorAll('[data-id]');
        const formButtonAdd = document.getElementById('form-button-add');
        const printButton = document.getElementById('printButton');
        const table = document.getElementById('provinsi-table');
       
        @if ($errors->any())
                const errorPopupModal = document.getElementById('error-popup-modal');
                if (errorPopupModal) {
                    errorPopupModal.classList.remove('hidden');
                }
        @endif

        modalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const target = button.dataset.modalTarget;
                const modal = document.getElementById(target);
                modal.classList.toggle('hidden');

                if (target === 'crud-modal') {
                    const modalTitle = document.getElementById('crud-modal-title');
                    const form = document.getElementById('crud-form');
                    const methodInput = document.getElementById('crud-method');
                    const idInput = document.getElementById('crud-id');
                    const namaProvinsiInput = document.getElementById('nama_provinsi');

                    // Check if edit mode (data-id attribute exists)
                    if (button.dataset.id) {
                        modalTitle.textContent = 'Edit Data Provinsi'; // Change modal title for edit mode

                        form.setAttribute('action', `{{ route('provinsi.update', '__id__') }}`.replace('__id__', button.dataset.id));
                        methodInput.value = 'PUT';
                        idInput.value = button.dataset.id;
                        formButtonAdd.textContent = 'Edit Data'; // Change submit button text for edit mode

                        // Fetch existing nama_provinsi value and populate the input field
                        fetch(`{{ route('provinsi.show', '__id__') }}`.replace('__id__', button.dataset.id))
                            .then(response => response.json())
                            .then(data => {
                                namaProvinsiInput.value = data.nama_provinsi;
                                
                            })
                            .catch(error => {
                                console.error('Error fetching data:', error);
                            });

                    } else {
                        modalTitle.textContent = 'Tambah Data Provinsi'; // Revert title for add mode
                        formButtonAdd.textContent = 'Add Data'; // Revert submit button text for add mode
                        form.setAttribute('action', '{{ route('provinsi.store') }}');
                        methodInput.value = 'POST';
                        idInput.value = '';
                        namaProvinsiInput.value = ''; // Reset input field for add mode
                    }
                }
            });
        });

        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const target = button.dataset.modalHide;
                const modal = document.getElementById(target);
                modal.classList.add('hidden');
            });
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                const deleteForm = document.getElementById('deleteForm');
                const action = deleteForm.getAttribute('action');
                const updatedAction = action.replace('__id__', id);
                deleteForm.setAttribute('action', updatedAction);
            });
        });

        // print data
    printButton.addEventListener('click', () => {
        const tableRows = table.rows;
        let newTableHtml = '<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md">';
        
        // Iterate over table rows
        for (let i = 0; i < tableRows.length; i++) {
            let rowHtml = '<tr>';
            
            // Iterate over table cells within each row (excluding last cell which contains action buttons)
            for (let j = 0; j < tableRows[i].cells.length - 1; j++) {
                rowHtml += tableRows[i].cells[j].outerHTML;
            }
            
            rowHtml += '</tr>';
            newTableHtml += rowHtml;
        }
        
        newTableHtml += '</table>';
        
        // Open a new window for printing
        const printWindow = window.open('', '', );
        
        // Write the HTML content to the print window
        printWindow.document.write(`
            <html>
            <head>
                <title>Print Data</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        font-size: 12pt;
                        line-height: 1.5;
                        margin: 20px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                        border: 1px solid #ddd;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                    .bg-white {
                        background-color: #fff;
                    }
                    .bg-gray-50 {
                        background-color: #f9fafb;
                    }
                    .bg-gray-800 {
                        background-color: #2d3748;
                    }
                    .text-gray-900 {
                        color: #1a202c;
                    }
                    .text-gray-700 {
                        color: #4a5568;
                    }
                    .text-gray-500 {
                        color: #718096;
                    }
                    .dark:text-white {
                        color: #fff;
                    }
                    .dark:bg-gray-800 {
                        background-color: #2d3748;
                    }
                    .dark:border-gray-700 {
                        border-color: #4a5568;
                    }
                    .dark:hover:bg-gray-600 {
                        background-color: #4a5568;
                    }
                    .hover:bg-gray-50 {
                        background-color: #f9fafb;
                    }
                    .hover:bg-gray-600 {
                        background-color: #4a5568;
                    }
                    .dark:hover:text-white {
                        color: #fff;
                    }
                    .dark:border-gray-700 {
                        border-color: #4a5568;
                    }
                    .dark:hover:text-white {
                        color: #fff;
                    }
                </style>
            </head>
            <body>
                ${newTableHtml}
            </body>
            </html>
        `);
        
        printWindow.document.close();
        printWindow.print();
        printWindow.close();
    });

});
</script>
