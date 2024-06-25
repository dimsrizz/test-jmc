<table id="provinsi-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Nama Provinsi</th>
            <th scope="col" class="px-6 py-3">Total Jumlah Penduduk</th>
            <th scope="col" class="px-6 py-3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($provinsi as $data)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $loop->iteration }}
            </th>
            <td class="px-6 py-4">
                {{ $data->nama_provinsi }}
            </td>
            <td class="px-6 py-4">
                {{ $data->total_jumlah_penduduk }}
            </td>
            <td class="px-6 py-4 flex">
                @include('provinsi.partials.action-buttons', ['id' => $data->id])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
