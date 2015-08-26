<?php

namespace CodeProject\Services;

use CodeProject\Repositories\ClientRepository;

use CodeProject\Validators\ClientValidator;

use \Prettus\Validator\Exceptions\ValidatorException;

class ClientService 
{

	/**
	 * @var ClientRepository
	 */
	protected $repository;
	/**
	 * @var ClientValidator
	 */
	protected $validator;
	
	public function __construct (ClientRepository $repository, ClientValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}

	public function create(array $data)
	{
		try {
			
			$this->validator->with($data)->passesOrFail();
			return $this->repository->create($data);

		} catch (ValidatorException $e) {
			
			return [
				'error' => true,
				'message' => $e->getMessageBag()
			];

		}
	}

	public function update(array $data, $id)
	{
		try {

			$this->validator->with($data)->passesOrFail();

			$C = $this->repository->find($id)->update($data);

			if($C){
				// return "O projeto '".$data['name']."', foi editado com sucesso!";
				return [
					'error' => false, 
					'message' =>"O cliente '".$data['name']."', foi editado com sucesso!" 
				];
			}

		} catch (ValidatorException $e) {
			
			return [
				'error' => true,
				'message' => $e->getMessageBag()
			];

		}
	}

	public function all()
	{
		try {
			
			return $this->repository->all();

		} catch (Exception $e) {
			
			return [
				'error' => true,
				'message' => $e->getMessage()
			];

		}
	}

	public function show($id)
	{
		try {
			
			return $this->repository->find($id);

		} catch (Exception $e) {
			
			return [
				'error' => true,
				'message' => $e->getMessage()
			];

		}
	}


}