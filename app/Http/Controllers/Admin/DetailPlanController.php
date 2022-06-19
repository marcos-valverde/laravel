<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateDetailPlan;
use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $detailPlan, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->detailPlan = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
        {
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'details' => $details,
            'plan' => $plan
        ]);
    }

    public function create($urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
        {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan
        ]);
    }

    public function store(StoreUpdateDetailPlan $request, $urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
        {
            return redirect()->back();
        }

        // $data = $request->all();
        // $data['plan_id'] = $plan->id;
        // $this->detailPlan->create($data);

        $plan->details()->create($request->all());

        return redirect()->route('plans.details.index', $plan->url);
    }

    public function edit($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $plan->details()->find($idDetail);

        if(!$plan || !$detail)
        {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
            'detail' => $detail,
            'plan' => $plan
        ]);
    }

    public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $plan->details()->find($idDetail);

        if(!$plan || !$detail)
        {
            return redirect()->back();
        }

        $detail->update($request->all());

        return redirect()->route('plans.details.index', $plan->url);
    }

    public function show($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $plan->details()->find($idDetail);

        if(!$plan || !$detail)
        {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', [
            'detail' => $detail,
            'plan' => $plan
        ]);
    }

    public function destroy($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $plan->details()->find($idDetail);

        if(!$plan || !$detail)
        {
            return redirect()->back();
        }

        $detail->delete();

        return redirect()
                ->route('plans.details.index', $plan->url)
                ->with('message', 'Registro deletado com sucesso!');
    }
}
