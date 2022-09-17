<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAddTask()
    {
        $inputData = ['label' => 'fusic',
        'task_name' => 'fusic',
        'start_date' => '2022-09-09',
        'end_date' => '2022-09-09',
        'status' => 1,
        'priority' => 2,
        'task_description' => 'fusic', ];

        $url = route('task.store');
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                ->post($url, $inputData);
        $response->assertRedirect(route('user.dashboard'));
        $this->assertDatabaseHas('tasks', $inputData);
    }

    public function testShowAllTasks()
    {
        $url = route('task.store');
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                ->post($url, [
                    'label' => 'fusicupdate',
                    'task_name' => 'fusicupdate',
                    'start_date' => '2022-10-10',
                    'end_date' => '2022-10-10',
                    'status' => 1,
                    'priority' => 2,
                    'task_description' => 'fusicupdate',
                ]);
        $response->assertRedirect(route('user.dashboard'));
        $responseTasksDataShow = $this->get(route('task.show'));
        $responseTasksDataShow->assertSee('fusicupdate');
    }

    public function testEditTask()
    {
        $inputData = ['label' => 'fusic',
        'task_name' => 'fusic',
        'start_date' => '2022-09-09',
        'end_date' => '2022-09-09',
        'status' => 1,
        'priority' => 2,
        'task_description' => 'fusic', ];
        $url = route('task.store');
        $user = User::factory()->create();
        $this->actingAs($user)
                ->post($url, $inputData);
        $editData = [
            'id' => $user->tasks->first()->id,
            'label' => 'fusicupdate',
            'task_name' => 'fusicupdate',
            'start_date' => '2022-09-15',
            'end_date' => '2022-09-20',
            'status' => 2,
            'priority' => 3,
            'task_description' => 'fusicupdate',
        ];
        $this->post(route('task.update'), $editData);
        $this->assertDatabaseHas('tasks', $editData);
    }

    public function testDeleteData()
    {
        $inputData = ['label' => 'fusic',
        'task_name' => 'fusic',
        'start_date' => '2022-09-09',
        'end_date' => '2022-09-09',
        'status' => 1,
        'priority' => 2,
        'task_description' => 'fusic', ];
        $url = route('task.store');
        $user = User::factory()->create();
        $this->actingAs($user)->post($url, $inputData);
        $this->get(route('task.delete', $user->tasks->first()->id));
        $this->assertDatabaseMissing('tasks', $inputData);
    }
}
