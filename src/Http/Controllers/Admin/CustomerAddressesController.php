<?php

namespace Railken\LaraOre\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Railken\Bag;
use Railken\LaraOre\Address\AddressManager;
use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\LaraOre\Customer\CustomerManager;

class CustomerAddressesController extends RestController
{
    public $queryable = [];

    public $fillable = [];

    public $managers;

    /**
     * Construct.
     */
    public function __construct(CustomerManager $container, AddressManager $data)
    {
        $this->managers = new Bag();
        $this->managers->container = $container;
        $this->managers->data = $data;
        $this->queryable = array_merge($this->queryable, collect((new AddressesController($this->managers->data))->queryable)->map(function ($v) {
            return ''.$v;
        })->toArray());
        parent::__construct();
    }

    /**
     * Display resources.
     *
     * @param $container_id
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index($container_id, Request $request)
    {
        $container = $this->managers->container->getRepository()->findOneById($container_id);

        if (!$container) {
            return $this->not_found();
        }

        $pc = new AddressesController($this->managers->data);
        $query = [];

        if ($request->input('query')) {
            $query[] = $request->input('query');
        }

        if ($container->addresses->count() > 0) {
            $query[] = 'id in ('.$container->addresses->map(function ($v) {
                return $v->id;
            })->implode(',').')';
        } else {
            $query[] = 'id = 0';
        }

        $query = implode(' and ', $query);

        $request->request->add(['query' => $query]);

        return $pc->index($request);
    }

    /**
     * Create a resource.
     *
     * @param string  $container_id
     * @param string  $id
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create($container_id, $id, Request $request)
    {
        $container = (new CustomerManager())->repository->findOneBy(['id' => $container_id]);
        $resource = $this->managers->data->repository->findOneBy(['id' => $id]);

        if (!$container || !$resource) {
            return $this->not_found();
        }

        !$container->addresses->contains($resource) && $container->addresses()->attach($resource);

        return $this->success(['message' => 'ok']);
    }

    /**
     * Remove a resource.
     *
     * @param string  $container_id
     * @param string  $id
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function remove($container_id, $id, Request $request)
    {
        $container = $this->managers->container->repository->findOneBy(['id' => $container_id]);
        $resource = $this->managers->data->repository->findOneBy(['id' => $id]);

        if (!$container || !$resource) {
            return $this->not_found();
        }

        $container->addresses()->detach($resource);

        return $this->success(['message' => 'ok']);
    }
}
