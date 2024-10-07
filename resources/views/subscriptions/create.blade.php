<x-layouts.layout>

  <x-layouts.container search_route="organizations.index">
    <div class="flex w-full h-screen mt-5 justify-stretch lg:ml-64">
      <div class="relative w-full px-4 lg:w-9/12">
        <div class="relative flex flex-col justify-center overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800"
          style="height: 450px;">
          <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
            <h3 class="text-xl font-semibold dark:text-white">
              Create a new subscription
            </h3>

            <x-buttons.button type="a" href="{{ route('organizations.index') }}"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white">
              <img src="{{ Vite::asset('resources/icons/close-icon.svg') }}" alt="" class="w-5 h-5">
            </x-buttons.button>
          </div>

          <div class="p-6 pb-12 max-h-[500px] overflow-y-auto">
            <!-- Enable scroll -->
            <form action="{{ route('subscriptions.store', $organization->id) }}" method="POST">
              @csrf

              <div class="grid grid-cols-1 gap-6 lg:grid-cols-6">

                <x-forms.form-field class="lg:col-span-3">
                  <x-forms.label for="suscription-listings">Subscription Type</x-forms.label>

                  <x-forms.form-select id="suscription-listings" name="type">
                    <option selected>Choose a Subscription Type</option>

                    <x-forms.form-option value="monthly">
                      Monthly
                    </x-forms.form-option>
                    <x-forms.form-option value="yearly">
                      Yearly
                    </x-forms.form-option>

                  </x-forms.form-select>

                  <x-forms.input-error key="suscription-listings" />
                  </x-form-field>

                  <x-forms.form-field class="lg:col-span-2">
                    <x-forms.label for="total">Total Installment</x-forms.label>
                    <x-forms.input id="total" name="total" type="text" value="{{ old('total') }}"
                      placeholder="Enter installment amount. E.g 100" />
                    <x-forms.input-error key="total" />
                  </x-forms.form-field>

                  <x-forms.form-field class="lg:col-span-2">
                    <x-forms.label for="per_amount">Per Installment Amount price</x-forms.label>
                    <x-forms.input id="per_amount" name="per_amount" type="text" value="{{ old('per_amount') }}"
                      placeholder="Per Installment Price" />
                    <x-forms.input-error key="per_amount" />
                  </x-forms.form-field>

                  <x-forms.form-field class="lg:col-span-2">
                    <x-forms.label for="penalty_amount">Penalty Charge</x-forms.label>
                    <x-forms.input id="penalty_amount" name="penalty_amount" type="text"
                      value="{{ old('penalty_amount') }}" placeholder="Per Installment Price" />
                    <x-forms.input-error key="penalty_amount" />
                  </x-forms.form-field>

                  <x-forms.form-field class="cursor-pointer lg:col-span-2" id="select-month-container">
                    <x-forms.label for="start">Installment Start</x-forms.label>
                    <x-forms.input id="start" name="start" type="text" value="{{ old('start') }}"
                      placeholder="Select to specify Installment start" />
                    <x-forms.input-error key="start" />

                    <?php $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct","Nov", "Dec"] ?>
                    <div class="hidden bg-gray-600 w-96" id="month-picker">
                      <div class="grid grid-cols-3 gap-3 p-6">
                        @foreach ($months as $month)
                        <p class="px-5 py-2 text-center text-white transition-all rounded-md cursor-pointer hover:bg-gray-400"
                          data-month="{{ $month }}">
                          {{ $month }}
                        </p>
                        @endforeach

                      </div>
                    </div>
                  </x-forms.form-field>

              </div>

              <div class="flex justify-end mt-6">
                <x-buttons.button type="submit" class="text-white text-sm px-4 py-2.5 text-center w-36"
                  value="create" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-layouts.container>
</x-layouts.layout>
