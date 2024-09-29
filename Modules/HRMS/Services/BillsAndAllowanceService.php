<?php

namespace Modules\HRMS\Services;

use Modules\HRMS\Models\BillsAndAllowance;
use Modules\HRMS\Models\GeneralExpense;
use Modules\HRMS\Models\TransportExpense;

class BillsAndAllowanceService
{
    
    public function getAll(int $limit = 20) {
        return BillsAndAllowance::query()
        ->searchByFields(['employee_id', 'date_of_bill_claim'])
        ->when(request( )->filled('from') && request( )->filled('to'), function ($qr) {
            $qr->whereBetween('date_of_bill_claim', [request('from'), request('to')]);
        })
        ->paginate($limit);
    }

    public function create(array $data, array $transportExpense, array $generalExpense)
    {
        $result['bills'] = BillsAndAllowance::create($data);

        $result['transportExpense'] = [];
        $result['generalExpense'] = [];

        if (isset($transportExpense['date_of_expense']) && count($transportExpense['date_of_expense']) > 0) {
            foreach ($transportExpense['date_of_expense']??[] as $key => $value) {
                if ($value != null) {
                $result['transportExpense'][] = TransportExpense::create([
                    'bills_and_allowance_id' => $result['bills']->id,
                    'date_of_expense' => $transportExpense['date_of_expense'][$key],
                    'from_location' => $transportExpense['from_location'][$key],
                    'to_location' => $transportExpense['to_location'][$key],
                    'transport_by' => $transportExpense['transport_by'][$key],
                    'distance' => $transportExpense['distance'][$key],
                    'expense_description' => $transportExpense['expense_description'][$key],
                    'amount' => $transportExpense['transport_amount'][$key],
                    'settlement_amount' => $transportExpense['transport_settlement_amount'][$key],
                    'receipts_invoices' => $transportExpense['receipts_invoices'][$key] ?? null,
                    'supporting_documents' => $transportExpense['supporting_documents'][$key] ?? null,
                ]);
                }
            }
        }

        if (isset($generalExpense['expense_type']) && count($generalExpense['expense_type']) > 0) {
            foreach ($generalExpense['expense_type']??[] as $key => $value) {
                if ($value != null) {
                $result['generalExpense'][] = GeneralExpense::create([
                    'bills_and_allowance_id' => $result['bills']->id,
                    'expense_date' => $generalExpense['expense_date'][$key] ?? null,
                    'expense_type' => $value,
                    'expense_description' => $generalExpense['expense_description'][$key] ?? null,
                    'amount' => $generalExpense['general_amount'][$key],
                    'settlement_amount' => $generalExpense['general_settlement_amount'][$key],
                    'receipts_invoices' => $generalExpense['receipts_invoices'][$key] ?? null,
                    'supporting_documents' => $generalExpense['supporting_documents'][$key] ?? null,
                ]);
                }
            }
        }
        

        return $result;
    }

    
  
    public function update($billsAndAllowance, array $data,  array $transportExpense, array $generalExpense)
    {
   
        $result['bills'] = $billsAndAllowance;
        $result['bills']->update($data);
        $result['bills']->transportExpenses()->whereNotIn('id', $transportExpense['transport_expense_id'] ?? [])->delete();
        $result['bills']->generalExpenses()->whereNotIn('id', $generalExpense['expense_id'] ?? [])->delete();

        $result['transportExpense'] = [];
        $result['generalExpense'] = [];

        if (isset($transportExpense['date_of_expense']) && count($transportExpense['date_of_expense']) > 0) {
            foreach ($transportExpense['date_of_expense']??[] as $key => $value) {
                if ($value != null) {
                $result['transportExpense'][] = TransportExpense::updateOrCreate([
                    'id' => $transportExpense['transport_expense_id'][$key]??null,
                ],[
                    'bills_and_allowance_id' => $result['bills']->id,
                    'date_of_expense' => $transportExpense['date_of_expense'][$key],
                    'from_location' => $transportExpense['from_location'][$key],
                    'to_location' => $transportExpense['to_location'][$key],
                    'transport_by' => $transportExpense['transport_by'][$key],
                    'distance' => $transportExpense['distance'][$key],
                    'expense_description' => $transportExpense['expense_description'][$key],
                    'amount' => $transportExpense['transport_amount'][$key],
                    'settlement_amount' => $transportExpense['transport_settlement_amount'][$key],
                    'receipts_invoices' => $transportExpense['receipts_invoices'][$key] ?? null,
                    'supporting_documents' => $transportExpense['supporting_documents'][$key] ?? null,
                ]);
                }
            }
        }

        if (isset($generalExpense['expense_type']) && count($generalExpense['expense_type']) > 0) {
            foreach ($generalExpense['expense_type']??[] as $key => $value) {
                if ($value != null) {
                $result['generalExpense'][] = GeneralExpense::updateOrCreate([
                    'id' => $generalExpense['general_expense_id'][$key]??null,
                ],
                [
                    'bills_and_allowance_id' => $result['bills']->id,
                    'expense_date' => $generalExpense['expense_date'][$key] ?? null,
                    'expense_type' => $value,
                    'expense_description' => $generalExpense['expense_description'][$key] ?? null,
                    'amount' => $generalExpense['general_amount'][$key],
                    'settlement_amount' => $generalExpense['general_settlement_amount'][$key],
                    'receipts_invoices' => $generalExpense['receipts_invoices'][$key] ?? null,
                    'supporting_documents' => $generalExpense['supporting_documents'][$key] ?? null,
                ]);
                }
            }
        }
        

        return $result;
    }

    public function delete(BillsAndAllowance $billsAndAllowance)
    {
        $billsAndAllowance->delete();
    }

    public function show($id)
    {
        return BillsAndAllowance::findOrFail($id);
    }
}
