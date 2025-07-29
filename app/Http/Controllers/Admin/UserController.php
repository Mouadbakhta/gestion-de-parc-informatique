<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

  class UserController extends Controller
  {
      public function index()
      {
          $users = User::with('departement')->get();
          return view('admin.users.index', compact('users'));
      }

      public function create()
      {
          $departements = Departement::all();
          return view('admin.users.create', compact('departements'));
      }

      public function store(Request $request)
      {
          $request->validate([
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              'role' => ['required', 'in:admin,employe'],
              'departement_id' => ['required', 'exists:departements,id'],
              'password' => ['required', 'confirmed', Rules\Password::defaults()],
          ]);

          User::create([
              'name' => $request->name,
              'email' => $request->email,
              'role' => $request->role,
              'departement_id' => $request->departement_id,
              'password' => Hash::make($request->password),
          ]);

          return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
      }

      public function edit(User $user)
      {
          $departements = Departement::all();
          return view('admin.users.edit', compact('user', 'departements'));
      }

      public function update(Request $request, User $user)
      {
          $request->validate([
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
              'role' => ['required', 'in:admin,employe'],
              'departement_id' => ['required', 'exists:departements,id'],
              'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
          ]);

          $user->update([
              'name' => $request->name,
              'email' => $request->email,
              'role' => $request->role,
              'departement_id' => $request->departement_id,
              'password' => $request->password ? Hash::make($request->password) : $user->password,
          ]);

          return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour.');
      }

      public function destroy(User $user)
      {
          $user->delete();
          return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé.');
      }
  }
?>
  