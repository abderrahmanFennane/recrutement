<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
 <div class="flex flex-col py-2 px-20">
  <div class="-m-1.5 overflow-x-auto  py-4 px-4">
    <div class="p-1.5 min-w-full inline-block align-middle  bg-indigo-200">
      <h1 class="text-3xl">Liste des contacts</h1>
      <!-- recherche -->
      <div class="py-2 flex justify-between">
        <div class="relative w-1/2">
          <label for="hs-table-with-pagination-search" class="sr-only">Search</label>
          <input
            type="text"
            name="search"
            id="search"
            class="p-2 block w-full border border-black-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-800 dark:border-black-700 dark:text-black-400"
            placeholder="Recherche..."
            onchange="this.value=''"
            >
          </div>     
        <button
          class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-cyan-500 border border-transparent font-semibold text-white hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm"
          type="button" onclick="emptyModal('modal')">
          <svg class="h-3 w-3 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>Ajouter
        </button>
      </div>

        <!-- Modal -->
        <div
          class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
          id="modal">
          <div class="relative w-full max-w-2xl max-h-full">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
              <!--header-->
              <div class="flex items-start justify-between p-5 border-b border-solid border-white-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                  Modal Title
                </h3>
                <button
                  class="p-1 ml-auto bg-transparent border-0 text-white-300 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                  onclick="toggleModal('modal')">
                  <span class="bg-transparent h-6 w-6 text-2xl block outline-none focus:outline-none">
                    <i class="fas fa-times"></i>
                  </span>
                </button>
              </div>
              <!--body-->
              <form class="p-6" id="formData" action="/" method="post">
                  @csrf
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <input class="appearance-none block w-full bg-white-100 text-white-700 border border-white-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" 
                      type="hidden" name="idC" id="hidden">
                    <!-- prenom -->
                    <div>
                      <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-first-name">
                        Prenom
                      </label>
                      <input class="appearance-none block w-full bg-white-100 text-white-700 border border-white-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" 
                      type="text" name="prenom" id="prenom">
                    </div>
                    <!-- nom -->
                    <div>
                      <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-last-name">
                        Nom
                      </label>
                      <input class="appearance-none block w-full bg-white-100 text-white-700 border border-white-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" 
                      type="text" name="nom" id="nomC">
                    </div>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <!-- email -->
                    <div>
                      <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-email">
                        Email
                      </label>
                      <input class="appearance-none block w-full bg-white-100 text-white-700 border border-white-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" 
                      type="email" name="e_mail" id="e_mail">
                    </div>
                    <!-- entreprise -->
                    <div >
                      <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-email">
                        Entreprise
                      </label>
                      <input class="appearance-none block w-full bg-white-100 text-white-700 border border-white-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" 
                      type="text" name="nomE"  id="nomE">
                    </div>
                  </div>
                  <!-- adresse -->
                  <div class="mt-4">
                    <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-address">
                      Adresse
                    </label>
                    <textarea class="appearance-none block w-full bg-white-100 text-white-700 border border-white-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" 
                    name="adresse"   id="adresse" rows="4" placeholder="Enter your address"></textarea>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                  <!-- ZIP -->
                    <div>
                      <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-zip">
                      Code postal
                      </label>
                      <input class="appearance-none block w-full bg-white-100 text-white-700 border border-white-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" 
                      type="Number" name="code_postal"  id="code_postal" placeholder="00000">
                    </div>
                    <!-- ville -->
                    <div>
                      <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-city">
                      ville
                      </label>
                      <input class="appearance-none block w-full bg-white-100 text-white-700 border border-white-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" 
                      type="text" name="ville"  id="ville" placeholder="">
                    </div>
                  </div>
                  <!-- statut -->
                  <div class="mt-4">
                    <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-state">
                      statut
                    </label>
                    <div class="relative">
                      <select name="statut" id="statut" class="appearance-none block w-full bg-white-100 text-white-700 border border-white-200 rounded py-3 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="grid-state">
                      @if($status)
                        @foreach ($status as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                      @endif
                      </select>
                    </div>
                  </div>
                  <!--footer-->
                  <div class="flex items-center justify-end p-6 border-t border-solid border-white-200 rounded-b">
                    <button
                    class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-stone-50 border border-black font-semibold text-black hover:text-black hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm"
                      type="button" onclick="toggleModal('modal')">
                      Annuler
                    </button> 
                    &nbsp
                    <button
                    class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-cyan-500 border border-transparent font-semibold text-white hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm"
                      type="submit" id="submitButton" onclick="toggleModal('modal')">
                      Valider
                    </button>
                  </div>

                </form>
            </div>
          </div>
        </div>
        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-backdrop"></div>
        <!-- fin de modal -->
        
        <!-- table -->
        <div class="border rounded-lg shadow overflow-hidden dark:border-white-700 dark:shadow-white-900">        
          <table class="min-w-full divide-y divide-black black:divide-black">
            <thead class="bg-indigo-100">
              <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase">
                      <a href="{{ route('indexRoute', ['sort_by' => ['contact.nom','contact.prenom'], 'sort_order' => $sortOrder, 'prev_sort_by' => $sortBy]) }}">
                          NOM DU CONTACT
                          @if($sortBy === 'contact.nom' || $sortBy === 'contact.prenom')
                              @if($sortOrder === 'asc') &#x25B2; @else &#x25BC; @endif
                          @endif
                      </a>
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase">
                      <a href="{{ route('indexRoute', ['sort_by' => 'organisation.nom', 'sort_order' => $sortOrder, 'prev_sort_by' => $sortBy]) }}">
                          SOCIETE
                          @if($sortBy === 'organisation.nom')
                              @if($sortOrder === 'asc') &#x25B2; @else &#x25BC; @endif
                          @endif
                      </a>
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase">
                      <a href="{{ route('indexRoute', ['sort_by' => 'organisation.statut', 'sort_order' => $sortOrder, 'prev_sort_by' => $sortBy]) }}">
                          sTATUT
                          @if($sortBy === 'organisation.statut')
                              @if($sortOrder === 'asc') &#x25B2; @else &#x25BC; @endif
                          @endif
                      </a>
                  </th>
                  <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-black-500 uppercase"></th>
              </tr>
            </thead>
            <tbody class="bg-white" id="alldata">
              @foreach ($contact as $item)
                <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black-800 dark:text-black-200">{{ $item->nomC." ".$item->prenom}}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black-800 dark:text-black-200">{{ $item->soc->nom }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black-800 dark:text-black-200">
                      @if( $item->soc->statut == 'CLIENT')    
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $item->soc->statut }}</span>
                      @elseif($item->soc->statut == 'LEAD' )    
                        <span class="bg-green-100 text-green-900 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $item->soc->statut }}</span>
                      @else   
                        <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $item->soc->statut }}</span>
                      @endif
                    </td>
                  <td class="px-2 py-2 text-sm font-medium flex gap-2">
                    <!-- show -->
                    <a><button id="showContact-{{ $item->idC }}" data-item-id="{{ $item->idC }}">
                      <svg class="h-6 w-6 text-black"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                      </svg>
                    </button></a>
                    <!-- edit -->
                    <a id="EditContact-{{ $item->idC }}" data-item-id="{{ $item->idC }}">
                      <svg class="h-6 w-6 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z"/>  
                          <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                          <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                        </svg> 
                  </a>                 <!-- delete -->
                    <a class="text-blue-500 hover:text-blue-700" onclick="showDeleteModal('{{ $item->idC }}')">
                      <svg class="h-5 w-5 text-red-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                        <line x1="10" y1="11" x2="10" y2="17" />
                        <line x1="14" y1="11" x2="14" y2="17" />
                      </svg>
                    </a>
                    <!-- delete modal -->
                    <div id="overlay-x{{ $item->idC }}" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>
                    <form action="{{ route('delete.contact', ['id' => $item->idC ]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <div id="dialog-x{{ $item->idC }}" class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-lg px-8 py-6 space-y-7 drop-shadow-lg">
                        <!-- Modal content... -->
                        <h3 class="text-2xl font-semibold flex">
                          <svg class="h-8 w-8 text-red-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
                            <line x1="12" y1="9" x2="12" y2="13" />
                            <line x1="12" y1="17" x2="12.01" y2="17" />
                          </svg>
                          Supprimer le contact
                        </h3>
                        <div class="py-5 border-t border-b border-gray-300">
                          <p>Etes-vous sur de vouloir supprimer le contact? cette operation est irreversible</p>
                        </div>
                        <div class="flex justify-end">
                          <button id="close" class="px-5 py-2 bg-indigo-300 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
                            Close
                          </button>
                          <button type="submit" class="px-5 py-2 bg-red-600 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
                            Confirmer
                          </button>
                        </div>
                      </div>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
            <tbody  class="bg-white" id="search_results">
            </tbody>
          </table>
        </div>
        <div></div>
        <div class="pagination py-2 align-right" style="justify-content: right;">
            {{ $contact->links() }}
        </div>
     </div>
   </div>
  </div>
</body>
<script src=".@themesberg/flowbite/dist/flowbite.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
      $('#search').on('keyup', function() {
        var query = $(this).val();
        console.log(query);
        if(query){
          $('#alldata').hide();
          $('#search_results').show();
          $.ajax(
            {
              type: "POST",
              url: "{{ URL::route('search') }}",
              data: {'search':query,
                '_token': '{{ csrf_token() }}'},
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
                console.log(data);
                displaySearchResults(data)
              }
            });
        }else{
          $('#alldata').show();
          $('#search_results').hide();
        }
        })
      })
  function removeQuotes(str) {
    return str.replace(/^'+|'+$/g, ''); 
  }
  function getSpanElement(statut) {
    if (statut == 'CLIENT') {
      return `<span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">${removeQuotes(statut)}</span>`;
    } else if (statut == 'LEAD') {
      return `<span class="bg-green-100 text-green-900 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">${removeQuotes(statut)}</span>`;
    } else {
      return `<span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">${removeQuotes(statut)}</span>`;
    }
  }
  function displaySearchResults(results) {
      const tableBody = document.getElementById('search_results');
      tableBody.innerHTML = '';
      results.forEach((item) => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black-800 dark:text-black-200">
              ${removeQuotes(item.nomC)} ${removeQuotes(item.prenom)}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black-800 dark:text-black-200">
              ${removeQuotes(item.soc.nom)}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black-800 dark:text-black-200">
            ${getSpanElement(item.soc.statut)}
            </td>
            <td class="px-2 py-2 text-sm font-medium flex gap-2">
                <button id="showContact-${item.idC}" data-item-id="${item.idC}" onclick="showModal(${item.idC})">
                  <svg class="h-6 w-6 text-black"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                  </svg>
                </button>
              <!-- edit -->
              <a class="text-blue-500 hover:text-blue-700" href=""><svg class="h-6 w-6 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />  <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg></a>
              <!-- delete -->
                <button class="text-blue-500 hover:text-blue-700" onclick="showDeleteModal(${item.idC})">
                  <svg class="h-5 w-5 text-red-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6" />
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                    <line x1="10" y1="11" x2="10" y2="17" />
                    <line x1="14" y1="11" x2="14" y2="17" />
                  </svg>
                </button>
                <!-- delete modal -->
                <div id="overlay-x${item.idC}" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>
                <form action="{{ route('delete.contact', ['id' => $item->idC ]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <div id="dialog-x${item.idC}" class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-lg px-8 py-6 space-y-7 drop-shadow-lg">
                    <!-- Modal content... -->
                    <h3 class="text-2xl font-semibold flex">
                      <svg class="h-8 w-8 text-red-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
                        <line x1="12" y1="9" x2="12" y2="13" />
                        <line x1="12" y1="17" x2="12.01" y2="17" />
                      </svg>
                      Supprimer le contact
                    </h3>
                    <div class="py-5 border-t border-b border-gray-300">
                      <p>Etes-vous sur de vouloir supprimer le contact? cette operation est irreversible</p>
                    </div>
                    <div class="flex justify-end">
                      <button id="close" class="px-5 py-2 bg-indigo-300 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
                        Close
                      </button>
                      <button type="submit" class="px-5 py-2 bg-red-600 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
                        Confirmer
                      </button>
                    </div>
                  </div>
                </form>
            </td>
          `;
          tableBody.appendChild(row);
      });
  }
  function showDeleteModal(contactData) {
    console.log(contactData);
    var dialog = document.getElementById('dialog-x' + contactData);
    var overlay = document.getElementById('overlay-x' + contactData);

    dialog.classList.remove('hidden');
    overlay.classList.remove('hidden');

    var closeButton = dialog.querySelector('#close');
    closeButton.addEventListener('click', function (event) {
      event.preventDefault();
      dialog.classList.add('hidden');
      overlay.classList.add('hidden');
    });
  }
  function emptyModal(modalID){  
    document.querySelector('#modal [name="prenom"]').value = null;
    document.querySelector('#modal [name="prenom"]').removeAttribute('readonly');
    document.querySelector('#modal [name="nom"]').value = null;
    document.querySelector('#modal [name="nom"]').removeAttribute('readonly'); 
    document.querySelector('#modal [name="e_mail"]').value = null;
    document.querySelector('#modal [name="e_mail"]').removeAttribute('readonly');
    document.querySelector('#modal [name="adresse"]').value = null;
    document.querySelector('#modal [name="adresse"]').removeAttribute('readonly'); 
    document.querySelector('#modal [name="ville"]').value = null;
    document.querySelector('#modal [name="ville"]').removeAttribute('readonly'); 
    document.querySelector('#modal [name="code_postal"]').value = null;
    document.querySelector('#modal [name="code_postal"]').removeAttribute('readonly'); 
    
    document.querySelector('#modal [name="nomE"]').value = null;
    document.querySelector('#modal [name="nomE"]').removeAttribute('readonly'); 

    const statutSelect = document.querySelector('#modal [name="statut"]');
    statutSelect.selectedIndex = -1; 
    statutSelect.disabled = false; 

    const submitButton = document.getElementById('submitButton');
    submitButton.type = 'submit'; 

    toggleModal(modalID);
  }
  function toggleModal(modalID) {
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
  }
  function showModal(id){
      console.log(id);
      $.ajax(
      {
        type: "POST",
        url: "{{ URL::route('show-data') }}",
        data: {'id':id,
          '_token': '{{ csrf_token() }}'},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
          console.log(data);
          showContactData(data)
        }
      });
  }
  $(document).ready(function() {
    $('[id^="showContact-"]').on('click', function() {
      var id = $(this).data('item-id');
      console.log(id);
      $.ajax(
      {
        type: "POST",
        url: "{{ URL::route('show-data') }}",
        data: {'id':id,
          '_token': '{{ csrf_token() }}'},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
          console.log(data);
          showContactData(data)
        }
      });
    })
  })
  function showContactData(contactData) {
    document.querySelector('#modal [name="prenom"]').value = contactData.prenom; 
    document.querySelector('#modal [name="prenom"]').setAttribute('readonly', 'true');        

    document.querySelector('#modal [name="nom"]').value = contactData.nomC;
    document.querySelector('#modal [name="nom"]').setAttribute('readonly', 'true');

    document.querySelector('#modal [name="e_mail"]').value = contactData.e_mail;
    document.querySelector('#modal [name="e_mail"]').setAttribute('readonly', 'true');
    
    document.querySelector('#modal [name="nomE"]').value = contactData.nomE;
    document.querySelector('#modal [name="nomE"]').setAttribute('readonly', 'true');

    document.querySelector('#modal [name="adresse"]').value = contactData.adresse;
    document.querySelector('#modal [name="adresse"]').setAttribute('readonly', 'true');

    document.querySelector('#modal [name="ville"]').value = contactData.ville;
    document.querySelector('#modal [name="ville"]').setAttribute('readonly', 'true');

    document.querySelector('#modal [name="code_postal"]').value = contactData.code_postal;
    document.querySelector('#modal [name="code_postal"]').setAttribute('readonly', 'true');
    
    const statutSelect = document.querySelector('#modal [name="statut"]');
    const selectedStatValue = contactData.statut;
    for (let i = 0; i < statutSelect.options.length; i++) {
      const option = statutSelect.options[i];
      if (option.value === selectedStatValue) {
        option.selected = true;
        break;
      }
    }
    statutSelect.disabled = true;

    const submitButton = document.getElementById('submitButton');
    submitButton.type = 'button';

    toggleModal('modal');
      
  }
  $(document).ready(function() {
    $('[id^="EditContact-"]').on('click', function() {
      var id = $(this).data('item-id');
      console.log(id);
      $.ajax(
      {
        type: "POST",
        url: "{{ URL::route('show-data') }}",
        data: {'id':id,
          '_token': '{{ csrf_token() }}'},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
          console.log(data);
          showEditData(data)
        }
      });
    })
  })

  function showEditData(contactData) {

    
    document.querySelector('#modal [name="idC"]').value = contactData.idC; 

    document.querySelector('#modal [name="prenom"]').value = contactData.prenom; 
    document.querySelector('#modal [name="prenom"]').removeAttribute('readonly', 'true');        

    document.querySelector('#modal [name="nom"]').value = contactData.nomC;
    document.querySelector('#modal [name="nom"]').removeAttribute('readonly', 'true');

    document.querySelector('#modal [name="e_mail"]').value = contactData.e_mail;
    document.querySelector('#modal [name="e_mail"]').removeAttribute('readonly', 'true');
    
    document.querySelector('#modal [name="nomE"]').value = contactData.nomE;
    document.querySelector('#modal [name="nomE"]').removeAttribute('readonly', 'true');

    document.querySelector('#modal [name="adresse"]').value = contactData.adresse;
    document.querySelector('#modal [name="adresse"]').removeAttribute('readonly', 'true');

    document.querySelector('#modal [name="ville"]').value = contactData.ville;
    document.querySelector('#modal [name="ville"]').removeAttribute('readonly', 'true');

    document.querySelector('#modal [name="code_postal"]').value = contactData.code_postal;
    document.querySelector('#modal [name="code_postal"]').removeAttribute('readonly', 'true');
    
    const statutSelect = document.querySelector('#modal [name="statut"]');
    const selectedStatValue = contactData.statut;
    for (let i = 0; i < statutSelect.options.length; i++) {
      const option = statutSelect.options[i];
      if (option.value === selectedStatValue) {
        option.selected = true;
        break;
      }
    }
    statutSelect.disabled = false;

    const submitButton = document.getElementById('submitButton');
    submitButton.type = 'submit';


    const form = document.getElementById('formData');
    form.action = '/edit';

    toggleModal('modal');
      
  }
</script>

</html>