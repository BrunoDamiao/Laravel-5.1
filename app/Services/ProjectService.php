<?php

namespace CodeProject\Services;

use CodeProject\Repositories\ProjectRepository;

use CodeProject\Validators\ProjectValidator;

use \Prettus\Validator\Exceptions\ValidatorException;

class ProjectService 
{

	/**
	 * @var ProjectRepository
	 */
	protected $repository;
	/**
	 * @var ProjectValidator
	 */
	protected $validator;
	
	public function __construct (ProjectRepository $repository, ProjectValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}

	public function create(array $data)
	{
		try {
			
			$this->validator->with($data)->passesOrFail();
			$p = $this->repository->create($data);

			if ($p) {
				return "Projeto criado com sucesso!";
			}

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

			$P = $this->repository->find($id)->update($data);
			
			if($P){
				return "O projeto '".$data['name']."', foi editado com sucesso!";
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
			
			// return $this->repository->find($id);
			return $this->repository->with(['client','user'])->find($id);

		} catch (Exception $e) {
			
			return [
				'error' => true,
				'message' => $e->getMessage()
			];

		}
	}


}