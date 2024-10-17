<x-layouts.layout>

  <x-layouts.container search_route="organizations.index">
    <div class="flex w-full h-screen mt-5 justify-stretch lg:ml-64">
      <div class="relative w-full px-4 lg:w-9/12">
        <div
          class="relative flex flex-col overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800"
          style="height: 300px;">
          <div
            class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
            <h3 class="text-xl font-semibold dark:text-white">
              Penalty Pay
            </h3>

            <x-buttons.button
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
              type="a"
              href='{{ route("installments.index", $subs_id) }}'>
              <img class="w-5 h-5"
                src="{{ Vite::asset("resources/icons/close-icon.svg") }}"
                alt="">
            </x-buttons.button>
          </div>

          <div class="p-6 pb-12 overflow-y-auto">
            <!-- Enable scroll -->
            <form action='{{ route("installments.penaltyPay") }}'
              method="POST">
              @csrf
              <div class="grid grid-cols-1 gap-6 lg:grid-cols-6">

                <x-forms.form-field class="lg:col-span-3">
                  <x-forms.label
                    for="penalty_charges">Amount</x-forms.label>
                  <x-forms.input id="penalty_charges"
                    name="penalty_charges" type="text"
                    value='{{ old("penalty_charges") }}'
                    placeholder="Enter Penalty Pay Amount" />
                  <x-forms.input-error key="penalty_charges" />
                </x-forms.form-field>

              </div>

              <div class="flex justify-end mt-6">
                <x-buttons.button
                  class="text-white text-sm px-4 py-2.5 text-center w-36"
                  type="submit" value="Pay" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-layouts.container>
</x-layouts.layout>
