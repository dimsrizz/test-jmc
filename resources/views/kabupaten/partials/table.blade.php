<table id="kabupaten-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md mt-4">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Nama Provinsi</th>
            <th scope="col" class="px-6 py-3">Nama Kabupaten</th>
            <th scope="col" class="px-6 py-3">Jumlah Penduduk</th>
            <th scope="col" class="px-6 py-3">Action</th>
            <th class="hidden">Provinsi ID</th> <!-- Hidden column for provinsi_id -->
        </tr>
    </thead>
    <tbody>
        @foreach ($kabupaten as $data)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $loop->iteration }}
            </th>
            <td class="px-6 py-4">
                {{ $data->provinsi->nama_provinsi }}
            </td>
            <td class="px-6 py-4"  >
                {{ $data->nama_kabupaten }}
            </td>
            <td class="px-6 py-4">
                {{ $data->jumlah_penduduk }}
            </td>
            <td class="px-6 py-4 flex">
                @include('kabupaten.partials.action-buttons', ['id' => $data->id])
            </td>
            <td class="hidden provinsi-id">{{ $data->provinsi_id }}</td> <!-- Hidden column value -->
        </tr>
        @endforeach
    </tbody>
</table>
